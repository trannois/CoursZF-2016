<?php
return [
    'modules' => [
        'Zend\Db',
    ],

    'router' => [
        'routes' => [
            'db' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/db',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // Segment route for viewing one blog post
                    'index' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/index[/:action]',
                            'defaults' => [
                                'controller' => 'db/index',
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'client' => [
                        'type'=> \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/client[/:action]',
                            'defaults' => [
                                'controller' => 'db/client',
                                'action' => 'index'
                            ],
                        ],
                    ],
                    'image' => [
                        'type'=> \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '/image/:path',
                            'defaults' => [
                                'controller' => 'db/image',
                                'action' => 'load',
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ],

    'controllers' => [
        'invokables' => [
            'db/image' => \UPJV\DbModule\Controller\ImageController::class,
        ],
        'factories' => [
            'db/index' => \UPJV\DbModule\Factory\IndexControllerFactory::class,
            'db/client' => \UPJV\DbModule\Factory\ClientControllerFactory::class,
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
            'DbModule/Db' => \UPJV\DbModule\Factory\ConnexionFactory::class,
            'Form/Client' => \UPJV\DbModule\Factory\FormClientFactory::class,
        ]
    ],

];