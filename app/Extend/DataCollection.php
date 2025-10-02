<?php

declare(strict_types=1);

namespace App\Extend;

use Hyde\Facades\Filesystem;
use Hyde\Markdown\Models\FrontMatter;
use Hyde\Markdown\Models\MarkdownDocument;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @experimental Typed data collections class extension.
 */
class DataCollection extends \Hyde\Support\DataCollection
{
    public static function yaml(string $name): static
    {
        if (static::hasType($name)) {
            return static::getTypedYaml($name);
        }

        return parent::yaml($name);
    }

    public static function markdown(string $name): static
    {
        if (static::hasType($name)) {
            return static::getTypedMarkdown($name);
        }

        return parent::markdown($name);
    }

    protected static function hasType(string $name): bool
    {
        return Filesystem::exists(self::getTypePath($name)) || class_exists(self::getTypeClassname($name));
    }

    /** @return static<\App\Extend\Concerns\DataCollectionType> */
    protected static function getTypedYaml(string $name): static
    {
        $className = self::getCallableTypeClassName($name);

        return parent::yaml($name)->map(fn (FrontMatter $data) => new $className($data->toArray()));
    }

    /** @return static<\App\Extend\Concerns\DataCollectionType> */
    protected static function getTypedMarkdown(string $name): static
    {
        $className = self::getCallableTypeClassName($name);

        return parent::markdown($name)->reject(fn (MarkdownDocument $document, string $key) => basename($key) === 'README.md') // Patch until https://github.com/hydephp/develop/issues/1716
            ->map(fn (MarkdownDocument $document) => new $className(array_merge(
                $document->matter()->toArray(),
                ['markdown' => $document->markdown()->body()]
            )));
    }

    protected static function getTypePath(string $name): string
    {
        return sprintf('%s/%s/type.php', static::$sourceDirectory, $name);
    }

    protected static function getTypeClassname(string $name): string
    {
        return 'App\\DataCollection\\Types\\'.Str::studly($name);
    }

    /** @return class-string<\App\Extend\Concerns\DataCollectionType> */
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

    protected static function findFiles(string $name, array|string $extensions): Collection
    {
        // Depends on https://github.com/hydephp/develop/issues/1716

        return parent::findFiles($name, $extensions)->reject(fn (string $file) => basename($file) === 'README.md');
    }
}
