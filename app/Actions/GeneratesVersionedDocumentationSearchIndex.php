<?php

declare(strict_types=1);

namespace App\Actions;

use Hyde\Facades\Config;
use Hyde\Framework\Concerns\InteractsWithDirectories;
use Hyde\Pages\DocumentationPage;
use Illuminate\Support\Collection;
use Hyde\Framework\Actions\ConvertsMarkdownToPlainText;

use function basename;
use function in_array;
use function trim;

/**
 * @internal Generate a JSON string that can be used as a search index for documentation pages.
 */
class GeneratesVersionedDocumentationSearchIndex
{
    use InteractsWithDirectories;

    protected Collection $index;

    /**
     * @since v2.x This method returns the JSON string instead of saving it to disk and returning the path.
     *
     * @return string The path to the generated file.
     */
    public static function handle(string $class): string
    {
        $service = new static();
        $service->run($class);

        return $service->index->toJson();
    }

    protected function __construct()
    {
        $this->index = new Collection();
    }

    protected function run(string $class): void
    {
        $class::all()
            ->filter(function (DocumentationPage $page) use ($class): bool {
                return $page::class === $class;
            })
            ->each(function (DocumentationPage $page): void {
                if (! in_array($page->identifier, $this->getPagesToExcludeFromSearch())) {
                    $this->index->push($this->generatePageEntry($page));
                }
            });
    }

    /**
     * @return array{slug: string, title: string, content: string, destination: string}
     */
    protected function generatePageEntry(DocumentationPage $page): array
    {
        return [
            'slug' => basename($page->identifier),
            'title' => $page->title,
            'content' => trim($this->getSearchContentForDocument($page)),
            'destination' => $this->formatDestination(basename($page->identifier)),
        ];
    }

    protected function getSearchContentForDocument(DocumentationPage $page): string
    {
        return (new ConvertsMarkdownToPlainText($page->markdown->body()))->execute();
    }

    protected function formatDestination(string $slug): string
    {
        if (Config::getBool('hyde.pretty_urls', false) === true) {
            return $slug === 'index' ? '' : $slug;
        }

        return "$slug.html";
    }

    protected function getPagesToExcludeFromSearch(): array
    {
        return array_merge(Config::getArray('docs.exclude_from_search', []),
            Config::getBool('docs.create_search_page', true) ? ['search'] : []
        );
    }
}
