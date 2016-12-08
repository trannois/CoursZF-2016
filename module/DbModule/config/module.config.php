<?php
return [
    'router' => [
        'routes' => [
            'db' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/db[/:action]',
                    'defaults' => [
                        'controller' => 'db/index',
                    ]
                ]
            ]
        ]
    ],

    'controllers' => [
        'invokables' => [
            'db/index'=> \UPJV\DbModule\Controller\IndexController::class,
        ]
    ],

    'view_manager' => [
        'template_map' => [
            'db/menu' => __DIR__.'/../view/menu.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];