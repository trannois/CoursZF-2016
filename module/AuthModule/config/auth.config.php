<?php
return [
    'services' => [
        'auth' => [
            // liste des controllers qui sont soumis à autorisation
            // si le nom du controller apparaît dans la liste il ne sera accécible que si l'utilsateur est identifié
            'db/index',
            'db/client',
        ]
    ]
];