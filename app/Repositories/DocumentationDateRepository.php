<?php

namespace App\Repositories;

use Carbon\CarbonImmutable;
use Hyde\Hyde;
use Symfony\Component\Process\Process;

/**
 * Looks up the last edit date of documentation source files from the Git history.
 *
 * All dates are read in a single `git log` call the first time one is needed, and are then kept
 * in a static array for the rest of the process, as the docs pages are all rendered in one run.
 *
 * That means the realtime compiler serves the dates from when its process booted, which is fine
 * locally, and CI always builds from a fresh process, so production dates are never stale.
 * If the initial Git call ever gets too slow, this is the place to add a persistent cache.
 */
class DocumentationDateRepository
{
    /** @var array<string, \Carbon\CarbonImmutable>|null Source paths mapped to the date of the commit that last touched them. */
    protected static ?array $dates = null;

    /** @param  string  $sourcePath  The page source path, relative to the project root, like `_docs/master/installation.md`. */
    public static function lastModified(string $sourcePath): ?CarbonImmutable
    {
        return static::all()[$sourcePath] ?? null;
    }

    /** @return array<string, \Carbon\CarbonImmutable> */
    public static function all(): array
    {
        return static::$dates ??= static::getDatesFromGitHistory();
    }

    /** @return array<string, \Carbon\CarbonImmutable> */
    protected static function getDatesFromGitHistory(): array
    {
        // Listing the commits newest first means the first time we see a file is its last edit.
        $process = new Process(
            ['git', 'log', '--no-merges', '--format=%ct', '--name-only', '--', '_docs'],
            Hyde::path()
        );

        $process->run();

        if (! $process->isSuccessful()) {
            return [];
        }

        $dates = [];
        $timestamp = null;

        foreach (explode("\n", $process->getOutput()) as $line) {
            $line = trim($line);

            if ($line === '') {
                continue;
            }

            if (ctype_digit($line)) {
                $timestamp = (int) $line;
            } elseif ($timestamp !== null && ! isset($dates[$line])) {
                $dates[$line] = CarbonImmutable::createFromTimestamp($timestamp);
            }
        }

        return $dates;
    }
}
