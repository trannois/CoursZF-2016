<?php
return [
    'router' => [
        'routes' => [
            'auth' => [
                'type' => \Zend\Router\Http\Literal::class,
                'options' => [
                    'route' => '/auth',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    // Segment route for viewing one blog post
                    'index' => [
                        'type' => \Zend\Router\Http\Segment::class,
                        'options' => [
                            'route' => '[/:action]',
                            'defaults' => [
                                'controller' => 'auth/index',
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ],

    'controllers' => [
        'factories' => [
            'auth/index' => \UPJV\AuthModule\Factory\IndexControllerFactory::class,
        ]
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'service_manager' => [
        'factories' => [
        ]
    ],

];