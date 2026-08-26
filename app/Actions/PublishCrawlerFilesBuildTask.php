<?php

declare(strict_types=1);

namespace App\Actions;

use Hyde\Hyde;
use Hyde\Framework\Features\BuildTasks\PostBuildTask;

use function copy;
use function file_exists;

class PublishCrawlerFilesBuildTask extends PostBuildTask
{
    protected static string $message = 'Publishing crawler guidance files';

    public function handle(): void
    {
        foreach (['llms.txt', 'robots.txt'] as $file) {
            $source = Hyde::path($file);

            if (file_exists($source)) {
                copy($source, Hyde::sitePath($file));
            }
        }
    }
}
