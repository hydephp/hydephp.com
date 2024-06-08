<?php

declare(strict_types=1);

namespace App\Extend;

use Hyde\Facades\Filesystem;
use Hyde\Markdown\Models\FrontMatter;
use Illuminate\Support\Str;

/**
 * @experimental Typed data collections class extension.
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
        return Filesystem::exists(self::getTypePath($name)) || class_exists(self::getTypeClassname($name));
    }

    /**
     * @return static<\App\Extend\Concerns\DataCollectionType>
     */
    protected static function getTypedYaml(string $name): static
    {
        $className = self::getCallableTypeClassName($name);

        return parent::yaml($name)->map(fn (FrontMatter $data) => new $className($data->toArray()));
    }

    protected static function getTypePath(string $name): string
    {
        return sprintf('%s/%s/type.php', static::$sourceDirectory, $name);
    }

    protected static function getTypeClassname(string $name): string
    {
        return 'App\\DataCollections\\Types\\'.Str::studly($name);
    }

    /**
     * @return class-string<\App\Extend\Concerns\DataCollectionType>
     */
    protected static function getCallableTypeClassName(string $name): string
    {
        // Load the anonymous class and turn it into a new runtime class
        $className = self::getTypeClassname($name);

        if (! class_exists($className)) {
            $type = include self::getTypePath($name);

            $newClassName = get_class($type);
            class_alias($newClassName, $className);
        }

        return $className;
    }
}
