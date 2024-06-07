<?php

// A simple script to test the build process was successful (called by a GitHub action)

function echo_color($message, $color_code)
{
    echo "\033[".$color_code.'m'.$message."\033[0m".PHP_EOL;
}

echo_color('=== Starting build test ===', '1;34'); // Bold Blue

chdir(__DIR__.'/..');

if (! file_exists('hyde')) {
    echo_color('Hyde executable not found', '1;31'); // Bold Red
    exit(2);
}

if (! file_exists('_site')) {
    echo_color('_site directory not found', '1;31'); // Bold Red
    exit(2);
}

$exitCode = 0;
$testsPassed = 0;
$testsFailed = 0;

echo PHP_EOL;
echo_color('> Discovering routes', '1;36'); // Bold Cyan

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
        return '_site/'.substr($path, 5);
    }, $routes);
})();

echo_color('> Found '.count($routes).' routes', '1;36'); // Bold Cyan
echo PHP_EOL;

$timeStart = microtime(true);

foreach ($routes as $route) {
    echo_color('> Testing '.$route, '1;33'); // Bold Yellow

    if (! file_exists($route)) {
        echo_color('File not found: '.$route, '1;31'); // Bold Red
        $testsFailed++;
        $exitCode = 1;
        continue;
    } else {
        echo_color('  > File found: '.$route, '1;32'); // Bold Green
    }

    $contents = file_get_contents($route);

    if (strlen($contents) === 0) {
        echo_color('  > File is empty: '.$route, '1;31'); // Bold Red
        $testsFailed++;
        $exitCode = 1;
        continue;
    } else {
        echo_color('  > File is not empty: '.$route, '1;32'); // Bold Green
    }

    echo_color('  > All route tests passed', '1;32'); // Bold Green
    $testsPassed++;
}

echo PHP_EOL;
echo_color('=== Build test completed ===', '1;34'); // Bold Blue
echo_color('Status: '.($exitCode === 0 ? 'Success' : 'Failed'), $exitCode === 0 ? '1;32' : '1;31'); // Bold Green if Success, Bold Red if Failed
echo_color('Tests passed: '.$testsPassed, '1;32'); // Bold Green
echo_color('Tests failed: '.$testsFailed, '1;31'); // Bold Red
echo_color('Time taken: '.round((microtime(true) - $timeStart) * 1000, 2).'ms', '1;36'); // Bold Cyan
echo_color('Exit code: '.$exitCode, '1;36'); // Bold Cyan

exit($exitCode);

/** @deprecated */
function dd($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}
