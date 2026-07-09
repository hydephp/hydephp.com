<?php

return [
    'paths' => [
        resource_path('views'),
        base_path('_pages'),
        base_path('_templates'),
    ],

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),
];
