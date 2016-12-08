<?php
return [
    'modules' => [
        'Zend\Db',
    ],

    'router' => [
        'routes' => [
            'db' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/db[/:action]',
                    'defaults' => [
                        'controller' => 'db/index',
                        'action' => 'index',
                    ]
                ]
            ]
        ]
    ],

    'controllers' => [
        'invokables' => [
        ],
        'factories' => [
            'db/index' => \UPJV\DbModule\Factory\IndexControllerFactory::class,
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
    'service_manager' => [
        'factories' => [
            'DbModule\Db' => \UPJV\DbModule\Factory\ConnexionFactory::class,
        ]
    ],

];