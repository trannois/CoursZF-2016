<?php
return [
    'modules' => [
        'UPJV\MiniModule',
        'Zend\Router',
    ],
    'module_listener_options' => [
        'module_paths' => [
            __DIR__.'/../module',
            __DIR__.'/../vendor',
        ],
    ],
];