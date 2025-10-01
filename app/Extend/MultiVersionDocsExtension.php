<?php

declare(strict_types=1);

namespace App\Extend;

use Hyde\Foundation\Concerns\HydeExtension;

class MultiVersionDocsExtension extends HydeExtension
{
    /**
     * Register all versioned documentation page classes.
     * You control the list in config('hyde.docs_versions').
     */
    public static function getPageClasses(): array
    {
        $classes = config('hyde.docs_versions', [
            // sensible defaults if config key is missing
            '2.x' => \Hyde\Pages\DocumentationPage::class,
            '1.x' => \App\Extend\Pages\v1DocumentationPage::class,
        ]);

        // Return only existing classes, de-duped
        return array_values(array_unique(array_filter(
            array_values($classes),
            static fn (string $class) => class_exists($class)
        )));
    }
}
