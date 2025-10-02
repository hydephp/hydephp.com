<?php

namespace App\Commands;

use Illuminate\Console\Command;
use RuntimeException;
use ZipArchive;

class SyncDocs extends Command
{
    protected $signature = 'docs:sync
        {--repo=hydephp/docs : owner/repo to fetch}
        {--ref=main : branch, tag, or commit SHA}
        {--dest=_docs : target base directory}
        {--only= : comma-separated subdirs to sync (defaults to 1.x,2.x)}';

    protected $description = 'Download and sync external docs into the local _docs directory.';

    private const DEFAULT_SUBDIRS = ['1.x', '2.x'];
    private const HTTP_TIMEOUT = 120;
    private const USER_AGENT = 'HydeDocsSync';

    public function handle(): int
    {
        $this->ensureZipArchiveAvailable();

        $config = $this->getConfiguration();
        $tempDir = $this->createTempDirectory();

        try {
            $zipPath = $this->downloadRepository($config['repo'], $config['ref'], $tempDir);
            $extractedPath = $this->extractArchive($zipPath, $tempDir);
            
            $this->syncDocumentation($extractedPath, $config['dest'], $config['subdirs']);
            
            $this->info('✓ Docs sync complete.');
            return self::SUCCESS;
        } catch (RuntimeException $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        } finally {
            $this->cleanup($tempDir);
        }
    }

    private function ensureZipArchiveAvailable(): void
    {
        if (!class_exists(ZipArchive::class)) {
            throw new RuntimeException('PHP ZipArchive extension is required (php-zip).');
        }
    }

    private function getConfiguration(): array
    {
        $subdirs = $this->option('only')
            ? array_map('trim', explode(',', $this->option('only')))
            : self::DEFAULT_SUBDIRS;

        return [
            'repo' => $this->option('repo'),
            'ref' => $this->option('ref'),
            'dest' => rtrim(base_path($this->option('dest')), DIRECTORY_SEPARATOR),
            'subdirs' => $subdirs,
        ];
    }

    private function createTempDirectory(): string
    {
        $tempDir = sys_get_temp_dir() . '/docs-sync-' . uniqid();
        
        if (!mkdir($tempDir, 0777, true)) {
            throw new RuntimeException("Failed to create temporary directory: {$tempDir}");
        }

        return $tempDir;
    }

    private function downloadRepository(string $repo, string $ref, string $tempDir): string
    {
        $zipUrl = "https://codeload.github.com/{$repo}/zip/{$ref}";
        $zipPath = $tempDir . '/repo.zip';

        $this->info("Downloading {$repo}@{$ref}...");

        $context = stream_context_create([
            'http' => [
                'timeout' => self::HTTP_TIMEOUT,
                'header' => 'User-Agent: ' . self::USER_AGENT . "\r\n",
            ],
            'https' => [
                'timeout' => self::HTTP_TIMEOUT,
                'header' => 'User-Agent: ' . self::USER_AGENT . "\r\n",
            ],
        ]);

        $data = @file_get_contents($zipUrl, false, $context);
        
        if ($data === false) {
            throw new RuntimeException("Failed to download ZIP from {$zipUrl}");
        }

        file_put_contents($zipPath, $data);
        
        return $zipPath;
    }

    private function extractArchive(string $zipPath, string $tempDir): string
    {
        $this->info('Extracting archive...');

        $zip = new ZipArchive();
        
        if ($zip->open($zipPath) !== true) {
            throw new RuntimeException('Failed to open ZIP archive.');
        }

        $zip->extractTo($tempDir);
        $rootFolder = $zip->getNameIndex(0);
        $zip->close();

        if (!$rootFolder) {
            throw new RuntimeException('ZIP archive appears to be empty.');
        }

        $extractedPath = $tempDir . '/' . rtrim($rootFolder, '/');
        
        if (!is_dir($extractedPath)) {
            throw new RuntimeException('Could not locate extracted repository folder.');
        }

        return realpath($extractedPath) ?: $extractedPath;
    }

    private function syncDocumentation(string $sourcePath, string $destPath, array $subdirs): void
    {
        $this->clearDestination($destPath);
        $this->mirrorSubdirectories($sourcePath, $destPath, $subdirs);
    }

    private function clearDestination(string $destPath): void
    {
        $this->line("Clearing destination: {$this->getRelativePath($destPath)}");
        $this->removeDirectory($destPath);
        
        if (!mkdir($destPath, 0777, true)) {
            throw new RuntimeException("Failed to create destination directory: {$destPath}");
        }
    }

    private function mirrorSubdirectories(string $sourcePath, string $destPath, array $subdirs): void
    {
        foreach ($subdirs as $subdir) {
            $source = $sourcePath . DIRECTORY_SEPARATOR . $subdir;
            $target = $destPath . DIRECTORY_SEPARATOR . $subdir;

            if (!is_dir($source)) {
                $this->warn("Skipping '{$subdir}' (not found in repository).");
                continue;
            }

            $this->line("Syncing {$subdir} → {$this->getRelativePath($target)}");
            
            if (!mkdir($target, 0777, true)) {
                throw new RuntimeException("Failed to create target directory: {$target}");
            }
            
            $this->mirrorDirectory($source, $target);
        }
    }

    private function mirrorDirectory(string $source, string $destination): void
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            $relativePath = $iterator->getSubPathName();
            $targetPath = $destination . DIRECTORY_SEPARATOR . $relativePath;

            if ($item->isDir()) {
                if (!is_dir($targetPath) && !mkdir($targetPath, 0777, true)) {
                    throw new RuntimeException("Failed to create directory: {$targetPath}");
                }
            } else {
                $targetDir = dirname($targetPath);
                
                if (!is_dir($targetDir) && !mkdir($targetDir, 0777, true)) {
                    throw new RuntimeException("Failed to create parent directory: {$targetDir}");
                }
                
                if (!copy($item->getPathname(), $targetPath)) {
                    throw new RuntimeException("Failed to copy file to {$targetPath}");
                }
            }
        }
    }

    private function removeDirectory(?string $directory): void
    {
        if (!$directory || !is_dir($directory)) {
            return;
        }

        $iterator = new \RecursiveDirectoryIterator(
            $directory,
            \FilesystemIterator::SKIP_DOTS
        );
        
        $files = new \RecursiveIteratorIterator(
            $iterator,
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $file) {
            if ($file->isDir()) {
                rmdir($file->getPathname());
            } else {
                unlink($file->getPathname());
            }
        }

        rmdir($directory);
    }

    private function getRelativePath(string $path): string
    {
        $basePath = base_path();
        
        if (str_starts_with($path, $basePath)) {
            return ltrim(substr($path, strlen($basePath)), DIRECTORY_SEPARATOR);
        }
        
        return $path;
    }

    private function cleanup(string $directory): void
    {
        $this->removeDirectory($directory);
    }
}