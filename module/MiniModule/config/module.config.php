<?php
return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => \Zend\Router\Http\Regex::class,
                'options' => [
                    'regex' => '/(?<action>[a-z|A-Z]+)',
                    'spec' => '/%action%',
                    'defaults' => [
                        'controller' => 'index',
                    ]
                ]
            ]
        ]
    ],

    'controllers' => [
        'invokables' => [
            'index'=> \UPJV\MiniModule\Controller\IndexController::class,
        ]
    ],

    'view_manager' => [
        'display_exceptions' => true,
        'exception_template' => 'error/index',
        'template_map' => [
            'error/index' => __DIR__.'/../view/error/index.phtml',
            '404' => __DIR__.'/../view/error/404.phtml',
            'index' => __DIR__.'/../view/index.phtml',
            'error' => __DIR__.'/../view/error.phtml',
            'layout/layout' => __DIR__.'/../view/layout.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ]
];