<?php

declare(strict_types=1);

namespace App\Actions;

use App\Validators\SiteValidationRunner;
use Hyde\Framework\Features\BuildTasks\PreBuildTask;
use Illuminate\Console\OutputStyle;
use Symfony\Component\Console\Command\Command;

class ValidateSiteBuildTask extends PreBuildTask
{
    protected static string $message = 'Validating site';

    /**
     * Run without the default exception handler so invalid content aborts the build.
     */
    public function run(?OutputStyle $output = null): int
    {
        if ($output) {
            $this->output = $output;
        }

        $this->printStartMessage();
        $this->handle();
        $this->printFinishMessage();

        return Command::SUCCESS;
    }

    public function handle(): void
    {
        app(SiteValidationRunner::class)->validate();
    }
}
