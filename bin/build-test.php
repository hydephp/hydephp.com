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

foreach ($routes as $route) {
    echo '> Testing ' . $route . PHP_EOL;
}

echo '=== Build test completed ===' . PHP_EOL;
exit($exitCode);

/** @deprecated */
function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}
