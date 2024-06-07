<?php

// A simple script to test the build process was successful (called by a GitHub action)

echo '=== Starting build test ===' . PHP_EOL;

chdir(__DIR__ . '/..');

if (! file_exists('hyde')) {
    echo 'Hyde executable not found';
    exit(2);
}

if (! file_exists('_site')) {
    echo '_site directory not found';
    exit(2);
}

$exitCode = 0;
$testsPassed = 0;
$testsFailed = 0;

$routes = (function (): array {
    // Todo: Use the JSON API proposed in https://github.com/hydephp/develop/issues/1715
    $list = shell_exec('php hyde route:list');
    $routes = explode("\n", trim($list));

    // Unset table structure elements
    array_shift($routes);
    array_shift($routes);
    array_shift($routes);
    array_pop($routes);
    $routes = array_values($routes);

    // Parse routes
    return array_map(function ($route) {
        $cells = explode('|', trim($route, '|'));
        $path = trim($cells[2]);

        // Replace prefix of docs/ with _site/
        return '_site/' . substr($path, 5);
    }, $routes);
})();

echo '> Found ' . count($routes) . ' routes' . PHP_EOL;

$timeStart = microtime(true);

foreach ($routes as $route) {
    echo '> Testing ' . $route . PHP_EOL;

    if (! file_exists($route)) {
        echo 'File not found: ' . $route . PHP_EOL;
        $testsFailed++;
        $exitCode = 1;
        continue;
    } else {
        echo '  > File found: ' . $route . PHP_EOL;
    }

    $contents = file_get_contents($route);

    if (strlen($contents) === 0) {
        echo '  > File is empty: ' . $route . PHP_EOL;
        $testsFailed++;
        $exitCode = 1;
        continue;
    } else {
        echo '  > File is not empty: ' . $route . PHP_EOL;
    }

    echo '  > All route tests passed' . PHP_EOL;
    $testsPassed++;
}

echo '=== Build test completed ===' . PHP_EOL;
echo 'Status: ' . ($exitCode === 0 ? 'Success' : 'Failed') . PHP_EOL;
echo 'Tests passed: ' . $testsPassed . PHP_EOL;
echo 'Tests failed: ' . $testsFailed . PHP_EOL;
echo 'Time taken: ' . round((microtime(true) - $timeStart) * 1000, 2) . 'ms' . PHP_EOL;
echo 'Exit code: ' . $exitCode . PHP_EOL;

exit($exitCode);

/** @deprecated */
function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}
