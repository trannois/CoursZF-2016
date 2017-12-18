<?php
return [
    // défintion des roles, plus le role est loin dans l'arborescence plus herite
    'role' => [
        'anonyme' => [
            'admin_db' => null,
        ],
    ],

    // dans le tableau allow, les clefs sont des roles et les valeurs sont des noms de controllers accecibles par le role
    'allow' => [
        'anonyme' => [
            'index',
        ],
        'admin_db' => [
            'db/index',
            'db/client',
            'db/image',
        ],
    ],
];