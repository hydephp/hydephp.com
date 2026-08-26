<?php

declare(strict_types=1);

namespace App\Actions;

use Hyde\Hyde;
use Hyde\Framework\Features\BuildTasks\PostBuildTask;

use DOMDocument;
use DOMXPath;

use function file_exists;
use function preg_match;

class FilterLegacyDocumentationSitemapBuildTask extends PostBuildTask
{
    protected static string $message = 'Removing legacy documentation from sitemap';

    public function handle(): void
    {
        $path = Hyde::sitePath('sitemap.xml');

        if (! file_exists($path)) {
            return;
        }

        $document = new DOMDocument();
        $document->preserveWhiteSpace = false;
        $document->formatOutput = true;

        if (! $document->load($path)) {
            return;
        }

        $xpath = new DOMXPath($document);
        // Hyde writes the sitemap with a default namespace. Use local-name() here so this
        // remains compatible with XML serializers that preserve or omit the namespace prefix.
        $urls = $xpath->query('//*[local-name() = "url"]');

        if ($urls === false) {
            return;
        }

        $removed = 0;

        foreach ($urls as $url) {
            $location = (string) $xpath->evaluate('string(*[local-name() = "loc"])', $url);

            if (preg_match('#/docs/(?:1\.x|master)(?:/|$)#', $location) === 1) {
                $url->parentNode?->removeChild($url);
                $removed++;
            }
        }

        if ($removed > 0) {
            $document->save($path);
        }
    }
}
