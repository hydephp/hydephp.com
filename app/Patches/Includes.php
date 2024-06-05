<?php

declare(strict_types=1);

namespace App\Patches;

use Symfony\Component\Yaml\Yaml;

/**
 * @internal Experimental class for added include types not yet added to the Hyde core.
 */
class Includes extends \Hyde\Support\Includes
{
    public static function yaml(string $filename, ?array $default = null): ?array
    {
        $path = static::path(basename($filename, '.yml').'.yml');

        if (! file_exists($path)) {
            return $default === null ? null : $default;
        }

        return Yaml::parseFile($path);
    }
}
