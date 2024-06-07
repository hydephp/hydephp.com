<?php

declare(strict_types=1);

namespace App\Extend;

use Illuminate\Support\Str;
use Hyde\Facades\Filesystem;

/**
 * Experimental typed data collections class extension.
 */
class DataCollections extends \Hyde\Support\DataCollections
{
    public static function yaml(string $name): static
    {
        if (static::hasType($name)) {
            return static::getTypedYaml($name);
        }

        return parent::yaml($name);
    }

    protected static function hasType(string $name): bool
    {
        return Filesystem::exists(self::getTypePath($name));
    }

    /**
     * @return static<\App\Extend\Concerns\DataCollectionType>
     */
    protected static function getTypedYaml(string $name): static
    {
        // Load the anonymous class and turn it into a new runtime class
        $className = 'App\\DataCollections\\Types\\' . Str::studly($name);

        if (class_exists($className)) {
            throw new \RuntimeException("Type class already exists: {$className}");
        }
    }

    protected static function getTypePath(string $name): string
    {
        return sprintf('%s/%s/type.php', static::$sourceDirectory, $name);
    }
}
