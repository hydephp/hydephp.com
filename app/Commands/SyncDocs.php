<?php

namespace App\Commands;

use Illuminate\Console\Command;
use ZipArchive;

class SyncDocs extends Command
{
    protected $signature = 'docs:sync
        {--repo=hydephp/docs : owner/repo to fetch}
        {--ref=main : branch, tag, or commit SHA}
        {--dest=_docs : target base directory}
        {--only= : comma-separated subdirs to sync (defaults to 1.x,2.x)}';

    protected $description = 'Download and sync external docs into the local _docs directory.';

    public function handle(): int
    {
        if (!class_exists(ZipArchive::class)) {
            $this->error('PHP ZipArchive extension is required (php-zip).');
            return self::FAILURE;
        }

        $repo = $this->option('repo');
        $ref  = $this->option('ref');
        $dest = rtrim(base_path($this->option('dest')), DIRECTORY_SEPARATOR);

        $subdirs = $this->option('only')
            ? array_map('trim', explode(',', $this->option('only')))
            : ['1.x', '2.x'];

        // Download ZIP from GitHub codeload
        $zipUrl = "https://codeload.github.com/{$repo}/zip/{$ref}";
        $tmpDir = sys_get_temp_dir() . '/docs-sync-' . uniqid();
        $zipPath = $tmpDir . '/repo.zip';
        @mkdir($tmpDir, 0777, true);

        $this->info("Downloading {$repo}@{$ref} …");
        $ctx = stream_context_create([
            'http'  => ['timeout' => 120, 'header' => "User-Agent: HydeDocsSync\r\n"],
            'https' => ['timeout' => 120, 'header' => "User-Agent: HydeDocsSync\r\n"],
        ]);
        $data = @file_get_contents($zipUrl, false, $ctx);
        if ($data === false) {
            $this->error("Failed to download ZIP from {$zipUrl}");
            return self::FAILURE;
        }
        file_put_contents($zipPath, $data);

        // Extract ZIP
        $this->info('Extracting …');
        $zip = new ZipArchive();
        if ($zip->open($zipPath) !== true) {
            $this->error('Failed to open ZIP archive.');
            return self::FAILURE;
        }
        $zip->extractTo($tmpDir);

        // Find the single top-level dir inside the zip cleanly
        $root = $zip->getNameIndex(0);
        $zip->close();
        if (!$root || !is_dir($tmpDir . '/' . rtrim($root, '/'))) {
            $this->error('Could not locate extracted repository folder.');
            return self::FAILURE;
        }
        $top = realpath($tmpDir . '/' . rtrim($root, '/')) ?: ($tmpDir . '/' . rtrim($root, '/'));

        // 1) Clear the ENTIRE destination (_docs) first
        $this->line("Clearing destination: {$this->rel($dest)}");
        $this->rrmdir($dest);
        @mkdir($dest, 0777, true);

        // 2) Mirror selected subdirs
        foreach ($subdirs as $dir) {
            $src = $top . DIRECTORY_SEPARATOR . $dir;
            $target = $dest . DIRECTORY_SEPARATOR . $dir;

            if (!is_dir($src)) {
                $this->warn("Skipping '{$dir}' (not found in repo).");
                continue;
            }

            $this->line("Syncing {$dir} → {$this->rel($target)}");
            @mkdir($target, 0777, true);
            $this->mirror($src, $target);
        }

        $this->info('Docs sync complete.');
        $this->cleanup($tmpDir);
        return self::SUCCESS;
    }

    /** Robust directory mirror that preserves files/dirs and extensions */
    protected function mirror(string $src, string $dst): void
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($src, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            /** @var \SplFileInfo $item */
            $rel = $iterator->getSubPathName(); // correct relative path
            $targetPath = $dst . DIRECTORY_SEPARATOR . $rel;

            if ($item->isDir()) {
                if (!is_dir($targetPath)) {
                    @mkdir($targetPath, 0777, true);
                }
            } else {
                @mkdir(dirname($targetPath), 0777, true);
                // Use pathnames to preserve the exact filename (with extension)
                if (!@copy($item->getPathname(), $targetPath)) {
                    throw new \RuntimeException("Failed to copy file to {$targetPath}");
                }
            }
        }
    }

    protected function rrmdir(?string $dir): void
    {
        if (!$dir || !is_dir($dir)) return;
        $it = new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS);
        $files = new \RecursiveIteratorIterator($it, \RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($files as $file) {
            $file->isDir() ? @rmdir($file->getPathname()) : @unlink($file->getPathname());
        }
        @rmdir($dir);
    }

    protected function rel(string $path): string
    {
        $base = base_path();
        return str_starts_with($path, $base) ? ltrim(substr($path, strlen($base)), DIRECTORY_SEPARATOR) : $path;
        // (If on older PHP: use strpos === 0)
    }

    protected function cleanup(string $dir): void
    {
        $this->rrmdir($dir);
    }
}
