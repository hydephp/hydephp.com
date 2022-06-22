<?php

namespace App\Commands;

use Hyde\Framework\Hyde;
use LaravelZero\Framework\Commands\Command;

/**
 * @todo Exclude changelog from search index
 */
class UpdateCommunityFiles extends Command
{
    protected $signature = 'download-community-files';
    protected $description = 'Download the latest community health files';

    public function handle()
    {
        $files = [
            'https://raw.githubusercontent.com/hydephp/develop/master/CHANGELOG.md' => '_pages/changelog.md',
            'https://raw.githubusercontent.com/hydephp/.github/master/LICENSE.md' => '_pages/license.md',
            'https://raw.githubusercontent.com/hydephp/.github/master/SECURITY.md' => '_pages/security.md',
            'https://raw.githubusercontent.com/hydephp/.github/master/CONTRIBUTING.md' => '_pages/contributing.md',
            'https://raw.githubusercontent.com/hydephp/.github/master/CODE_OF_CONDUCT.md' => '_pages/code-of-conduct.md',
        ];

        foreach ($files as $url => $file) {
            $this->info("Downloading $url into $file...");
            $contents = file_get_contents($url);
            file_put_contents(Hyde::path($file), $contents);
        }

        // $this->info('Transforming changelog...');
        // file_put_contents(Hyde::path('_docs/changelog.md'), "---\npriority: 40\ncategory: \"Digging Deeper\"\n---\n\n" . file_get_contents(Hyde::path('_docs/changelog.md')));

        $this->info('Community files downloaded successfully.');
    }
}
