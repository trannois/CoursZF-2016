<?php
use Zend\Form\Element\Date;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
return [
    'elements' => [
        // la saisie du login (type text)
        [
            'spec' => [
                'type' => Text::class,
                'name' => 'log',
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
                'type' => Date::class,
                'name' => 'dateInscription',
                'options' => [
                    'label' => 'Date d\'inscription : ',
                    'format' => 'd/m/Y',
                ],
            ],
        ],
        // le boutton de validation
        [
            'spec' => [
                'type' => Submit::class,
                'name' => 'submit',
                'attributes' => [
                    'value' => 'Suite',
                ],
            ],
        ],
    ],
    'input_filter' => [
        'log' => [
            'required' => true,
            'validators' => [
                [ // def premier validator
                    'name' => \Zend\I18n\Validator\Alpha::class,
                    'options' => [

                    ]
                ],
                [ // def deuxième validator
                    'name' => \Zend\Validator\StringLength::class,
                    'options' => [
                        'min' => 3,
                        'max' => 20
                    ]
                ]
            ],
            'filters'  => [
                [
                    'name' => \Zend\I18n\Filter\Alpha::class
                ],
            ],
        ]
    ]
];