<?php

namespace App\Commands;

use Hyde\Hyde;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use ZipArchive;

class SyncCommand extends Command
{
    protected $signature = 'sync {--repo=hydephp/docs : The GitHub repo to pull the docs archive from}
                                 {--branch=main : The branch of the docs repo to download}';

    protected $description = 'Sync the _docs directory and static pages from the HydePHP docs and .github repositories';

    /**
     * Raw files to download verbatim into _pages.
     *
     * @var array<string, string>
     */
    protected array $files = [
        'https://raw.githubusercontent.com/hydephp/develop/master/CHANGELOG.md' => '_pages/changelog.md',
        'https://raw.githubusercontent.com/hydephp/develop/master/LICENSE.md' => '_pages/license.md',
        'https://raw.githubusercontent.com/hydephp/develop/master/SECURITY.md' => '_pages/security.md',
        'https://raw.githubusercontent.com/hydephp/develop/master/CONTRIBUTING.md' => '_pages/contributing.md',
        'https://raw.githubusercontent.com/hydephp/.github/master/CODE_OF_CONDUCT.md' => '_pages/code-of-conduct.md',
    ];

    public function handle(): int
    {
        if (! $this->syncDocs()) {
            return self::FAILURE;
        }

        if (! $this->syncPages()) {
            return self::FAILURE;
        }

        $this->info('Done!');

        return self::SUCCESS;
    }

    protected function syncDocs(): bool
    {
        $repo = $this->option('repo');
        $branch = $this->option('branch');

        $this->info("Syncing docs from {$repo}@{$branch}...");

        $zipUrl = "https://codeload.github.com/{$repo}/zip/refs/heads/{$branch}";
        $tempZip = storage_path('app/tmp-docs-sync.zip');
        $tempDir = storage_path('app/tmp-docs-sync');

        $this->line('Downloading archive...');
        $response = Http::timeout(60)->retry(3, 500)->get($zipUrl);

        if ($response->failed()) {
            $this->error("Failed to download {$zipUrl}");

            return false;
        }

        File::ensureDirectoryExists(dirname($tempZip));
        File::put($tempZip, $response->body());

        $this->line('Extracting archive...');
        File::deleteDirectory($tempDir);
        File::ensureDirectoryExists($tempDir);

        $zip = new ZipArchive();

        if ($zip->open($tempZip) !== true) {
            $this->error('Failed to open the downloaded archive.');
            File::delete($tempZip);

            return false;
        }

        $zip->extractTo($tempDir);
        $zip->close();
        File::delete($tempZip);

        // GitHub zips always extract into a single "{repo}-{branch}" root folder.
        $extractedRoot = collect(File::directories($tempDir))->first();

        if (! $extractedRoot) {
            $this->error('Could not locate extracted archive contents.');
            File::deleteDirectory($tempDir);

            return false;
        }

        $docsPath = Hyde::path('_docs');

        $this->line('Clearing existing _docs contents...');
        File::deleteDirectory($docsPath);
        File::ensureDirectoryExists($docsPath);

        // Copy over only directories found in the archive root. This skips any
        // root-level files (README.md, .gitattributes, etc.) and automatically
        // picks up new version directories (e.g. 3.x) without any code changes.
        $synced = [];

        foreach (File::directories($extractedRoot) as $directory) {
            $name = basename($directory);
            File::copyDirectory($directory, "{$docsPath}/{$name}");
            $synced[] = $name;
        }

        File::deleteDirectory($tempDir);

        $this->info('Synced directories: '.implode(', ', $synced));

        return true;
    }

    protected function syncPages(): bool
    {
        $this->info('Syncing static pages...');

        File::ensureDirectoryExists(Hyde::path('_pages'));

        foreach ($this->files as $url => $destination) {
            $this->line("Fetching {$url}...");

            $response = Http::timeout(30)->retry(3, 500)->get($url);

            if ($response->failed()) {
                $this->error("Failed to download {$url}");

                return false;
            }

            $contents = $response->body();

            if ($destination === '_pages/license.md') {
                $contents = $this->wrapLicenseFile($contents);
            }

            if ($destination === '_pages/security.md') {
                $contents = $this->replaceSecurityStatusEmoji($contents);
            }

            $path = Hyde::path($destination);
            File::ensureDirectoryExists(dirname($path));
            File::put($path, $contents);
        }

        return true;
    }

    /**
     * Replace GitHub emoji shortcodes unsupported by the Markdown renderer.
     */
    protected function replaceSecurityStatusEmoji(string $contents): string
    {
        return str_replace(
            [':construction:', ':white_check_mark:', ':warning:', ':x:'],
            ['🚧', '✅', '⚠️', '❌'],
            $contents,
        );
    }

    /**
     * Wrap the raw LICENSE.md contents in a Markdown header and fenced code block.
     */
    protected function wrapLicenseFile(string $contents): string
    {
        $contents = trim($contents);

        return <<<MARKDOWN
        # HydePHP Software License

        The following is the license for the HydePHP Software:

        ```
        {$contents}
        ```

        MARKDOWN;
    }
}
