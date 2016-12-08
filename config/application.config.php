<?php
return [
    'modules' => [
        'UPJV\DbModule',
        'UPJV\MiniModule',
        'Zend\Router',
        'Zend\Form',
    ],
    'module_listener_options' => [
        'module_paths' => [
            __DIR__.'/../module',
            __DIR__.'/../vendor',
        ],
        'config_glob_paths' => [
            __DIR__.'/global/db.config.php',
        ],
    ],
];