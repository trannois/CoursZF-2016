<?php
return [
    'elements' => [
        // la saisie du login (type text)
        [
            'spec' => [
                'type' => \Zend\Form\Element\Text::class,
                'name' => 'nom',
                'attributes' => [
                    'size' => '20',
                ],
                'options' => [
                    'label' => 'Login : ',
                ],
            ],
        ],
        // champ date non obligatoire pour illustrer l'inclusion de script JS
        // ici le champ date sera un datepicker de JQuery
        [
            'spec' => [
                'type' => \Zend\Form\Element\Date::class,
                'name' => 'date',
                'options' => [
                    'label' => 'Date d\'inscription : ',
                    'format' => 'Y-m-d',
                ],
            ],
        ],
        //
        [
            'spec' => [
                'type' => \Zend\Form\Element\Password::class,
                'name' => 'pass',
                'attributes' => [
                    'size' => '20',
                ],
                'options' => [
                    'label' => 'Password : ',
                ],
            ],
        ],
        [
            'spec' => [
                'type' => \Zend\Form\Element\Password::class,
                'name' => 'clientConfirmationPass',
                'attributes' => [
                    'size' => '20',
                ],
                'options' => [
                    'label' => 'Password Vérification : ',
                ],
            ],
        ],
        // le boutton de validation
        [
            'spec' => [
                'type' => \Zend\Form\Element\Submit::class,
                'name' => 'submit',
                'attributes' => [
                    'value' => 'Suite',
                ],
            ],
        ],
    ],
];