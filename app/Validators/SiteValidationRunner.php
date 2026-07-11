<?php

declare(strict_types=1);

namespace App\Validators;

class SiteValidationRunner
{
    public function validate(): void
    {
        foreach ($this->validators() as $validator) {
            $validator->validate();
        }
    }

    /** @return list<\App\Validators\SiteValidation> */
    private function validators(): array
    {
        $validatorClasses = glob(app_path('Validators/*Validator.php')) ?: [];

        return array_map(
            fn (string $path): SiteValidation => app('App\\Validators\\'.basename($path, '.php')),
            $validatorClasses,
        );
    }
}
