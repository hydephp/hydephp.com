<?php

declare(strict_types=1);

namespace App\Commands;

use App\Validators\SiteValidationRunner;
use Illuminate\Console\Command;
use Throwable;

class SiteValidateCommand extends Command
{
    protected $signature = 'site:validate';

    protected $description = 'Validate site content';

    public function handle(): int
    {
        try {
            app(SiteValidationRunner::class)->validate();
        } catch (Throwable $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }

        $this->info('Site validation passed.');

        return self::SUCCESS;
    }
}
