<?php

/**
 * Copy documentation Markdown source files into the built site so AI agents
 * (and anyone else) can read the raw docs at the page URL with a `.md` suffix.
 *
 * The output path is flattened the same way Hyde flattens the HTML pages:
 * the category directory is dropped, the version directory is kept.
 *
 *   Source: _docs/2.x/getting-started/core-concepts.md
 *   URL:    https://hydephp.com/docs/2.x/core-concepts        (HTML page)
 *   Output: docs/docs/2.x/core-concepts.md   ->  .../core-concepts.md
 *
 * Files inside a `redirects` directory are not copied verbatim. Instead we
 * emit a short pointer telling the reader where the page actually lives, so an
 * agent fetching the old `.md` URL is sent to the current one.
 */

const SITE_URL = 'https://hydephp.com';

$sourceRoot = realpath(__DIR__ . '/../../_docs');
$outputRoot = __DIR__ . '/../../docs/docs';

if ($sourceRoot === false) {
    fwrite(STDERR, "Could not find the _docs directory.\n");
    exit(1);
}

$copied = 0;
$rewritten = 0;

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($sourceRoot, FilesystemIterator::SKIP_DOTS)
);

foreach ($files as $file) {
    if ($file->getExtension() !== 'md') {
        continue;
    }

    // e.g. "2.x/getting-started/core-concepts.md"
    $relative = substr($file->getPathname(), strlen($sourceRoot) + 1);
    $segments = explode(DIRECTORY_SEPARATOR, $relative);

    $version = array_shift($segments);   // "2.x"
    $filename = array_pop($segments);    // "core-concepts.md"
    $category = $segments[0] ?? null;    // "getting-started" | "redirects" | null

    // Flatten: keep the version, drop any category directories, keep the file.
    $targetDir = $outputRoot . '/' . $version;
    $targetPath = $targetDir . '/' . $filename;

    if (! is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    if ($category === 'redirects') {
        file_put_contents($targetPath, buildRedirectPointer($file->getPathname(), $version));
        $rewritten++;

        continue;
    }

    copy($file->getPathname(), $targetPath);
    $copied++;
}

echo "Copied {$copied} documentation files, rewrote {$rewritten} redirects.\n";

/**
 * Turn a redirect stub into a plain pointer to the real page.
 */
function buildRedirectPointer(string $sourcePath, string $version): string
{
    $contents = file_get_contents($sourcePath);

    // Pull the destination slug out of <meta ... content="0;url=quickstart" />
    if (! preg_match('/url=([^"\'\s]+)/i', $contents, $matches)) {
        return "This documentation page has moved.\n";
    }

    $target = ltrim(trim($matches[1]), './');
    $url = SITE_URL . "/docs/{$version}/{$target}";

    return <<<MD
        ---
        redirect: true
        ---
        This page has moved to {$url}

        Read the Markdown source at {$url}.md

        MD;
}
