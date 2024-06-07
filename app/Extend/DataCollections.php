<?php

declare(strict_types=1);

namespace App\Extend;

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
        return Filesystem::exists(sprintf('%s/%s/type.php', static::$sourceDirectory, $name));
    }

    /**
     * @return static<\App\Extend\Concerns\DataCollectionType>
     */
    protected static function getTypedYaml(string $name): static
    {
        //
    }
}
