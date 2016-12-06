<?php
return [
    'modules' => [
        'UPJV\MiniModule',
        'Zend\Router',
        'Zend\Form',
    ],
    'module_listener_options' => [
        'module_paths' => [
            __DIR__.'/../module',
            __DIR__.'/../vendor',
        ],
    ],
    'service_manager' => [
    ],
];