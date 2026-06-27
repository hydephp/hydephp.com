<?php

declare(strict_types=1);

$redirectsFile = $argv[1] ?? '_pages/redirects.txt';
$outputRoot = rtrim($argv[2] ?? 'docs', '/');

if (! file_exists($redirectsFile)) {
    fwrite(STDERR, "Redirects file not found: {$redirectsFile}\n");
    exit(1);
}

$lines = file($redirectsFile, FILE_IGNORE_NEW_LINES);

$created = 0;
$skipped = 0;

foreach ($lines as $index => $line) {
    $lineNumber = $index + 1;
    $line = trim($line);

    if ($line === '' || str_starts_with($line, '#')) {
        $skipped++;
        continue;
    }

    if (! str_contains($line, '=>')) {
        fwrite(STDERR, "Invalid redirect on line {$lineNumber}: missing `=>`\n");
        exit(1);
    }

    [$from, $to] = array_map('trim', explode('=>', $line, 2));

    if ($from === '' || $to === '') {
        fwrite(STDERR, "Invalid redirect on line {$lineNumber}: source and target are required\n");
        exit(1);
    }

    $fromPath = str_replace('\\', '/', ltrim($from, '/'));

    if ($fromPath === '' || str_contains($fromPath, '..')) {
        fwrite(STDERR, "Invalid redirect source on line {$lineNumber}: {$from}\n");
        exit(1);
    }

    if (str_ends_with($fromPath, '/')) {
        $fromPath .= 'index.html';
    }

    $outputFile = "{$outputRoot}/{$fromPath}.html";
    $outputDirectory = dirname($outputFile);

    if (! is_dir($outputDirectory) && ! mkdir($outputDirectory, 0775, true) && ! is_dir($outputDirectory)) {
        fwrite(STDERR, "Could not create directory: {$outputDirectory}\n");
        exit(1);
    }

    $escapedTarget = htmlspecialchars($to, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $jsTarget = json_encode($to, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES);

    $html = <<<HTML
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="0; url={$escapedTarget}">
    <link rel="canonical" href="{$escapedTarget}">
    <title>Redirecting...</title>
    <script>window.location.replace({$jsTarget});</script>
</head>
<body>
    <p>Redirecting to <a href="{$escapedTarget}">{$escapedTarget}</a>.</p>
</body>
</html>

HTML;

    file_put_contents($outputFile, $html);

    echo "Created redirect: {$from} => {$to} [{$outputFile}]\n";
    $created++;
}

echo "Redirect generation complete: {$created} created, {$skipped} skipped.\n";
