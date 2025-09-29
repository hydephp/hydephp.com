<?php

declare(strict_types=1);

namespace App\Extend\Pages;

use Hyde\Facades\Config;
use Hyde\Foundation\Facades\Routes;
use Hyde\Framework\Actions\GeneratesTableOfContents;
use Hyde\Pages\DocumentationPage as BaseDocsPage; // reuse all behaviors
use Hyde\Support\Models\Route;

use function basename;
use function Hyde\unslash;
use function sprintf;
use function trim;

class v1DocumentationPage extends BaseDocsPage
{
    /** Source and output are locked to v1 */
    public static string $sourceDirectory = '_docs/1.x';
    public static string $outputDirectory = 'docs/1.x';
    public static string $template = 'hyde::layouts/docs';

    public static function home(): ?Route
    {
        return Routes::get(static::homeRouteName());
    }

    public static function homeRouteName(): string
    {
        return unslash(static::baseRouteKey().'/index');
    }

    /**
     * Edit link. Prefer a v1-specific config if present:
     *   'docs_v1.source_file_location_base' (e.g. https://github.com/hydephp/docs/tree/main/1.x)
     * Fallbacks to 'docs.source_file_location_base'.
     */
    public function getOnlineSourcePath(): string|false
    {
        $base = Config::getNullableString('docs_v1.source_file_location_base')
            ?? Config::getNullableString('docs.source_file_location_base');

        if ($base === null) {
            return false;
        }

        // $this->identifier is relative to _docs/1.x already
        return sprintf('%s/%s.md', trim($base, '/'), $this->identifier);
    }

    public static function hasTableOfContents(): bool
    {
        // reuse global toggle; add a v1 override if you want later
        return Config::getBool('docs.table_of_contents.enabled', true);
    }

    public function getTableOfContents(): string
    {
        return (new GeneratesTableOfContents($this->markdown))->execute();
    }

    /** Flattened route/output like the normal docs pages, but under docs/1.x */
    public function getRouteKey(): string
    {
        return Config::getBool('docs.flattened_output_paths', true)
            ? unslash(static::outputDirectory().'/'.basename($this->identifier))
            : parent::getRouteKey();
    }

    public function getOutputPath(): string
    {
        return Config::getBool('docs.flattened_output_paths', true)
            ? static::outputPath(basename($this->identifier))
            : parent::getOutputPath();
    }
}