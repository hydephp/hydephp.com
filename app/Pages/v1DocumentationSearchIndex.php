<?php

declare(strict_types=1);

namespace App\Pages;

use Hyde\Pages\InMemoryPage;
use Hyde\Framework\Actions\GeneratesDocumentationSearchIndex;
use App\Actions\GeneratesVersionedDocumentationSearchIndex;
use App\Extend\Pages\v1DocumentationPage;

class v1DocumentationSearchIndex extends InMemoryPage
{
    /**
     * Create a new DocumentationSearchPage instance.
     */
    public function __construct()
    {
        parent::__construct(static::outputPath(), [
            'navigation' => ['hidden' => true],
        ]);
    }

    public function compile(): string
    {
        return GeneratesVersionedDocumentationSearchIndex::handle(v1DocumentationPage::class);
    }

    /**
     * Output the path for the versioned search index.
     */
    public static function outputPath(string $identifier = ''): string
    {
        return 'docs/1.x/search.json';
    }
}