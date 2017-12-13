<?php
// définition du formulaire permettant de choisir la couleur de fond
return [
    'elements' => [
        // choisir la couleur
        [
            'spec' => [
                'type' => \Zend\Form\Element\Color::class,
                'name' => 'couleur',
                'options' => [
                    'label' => 'Choisir couleur : ',
                ],
            ],
        ],
            // le boutton de validation
        [
            'spec' => [
                'type' => \Zend\Form\Element\Button::class,
                'name' => 'submit',
                'options' => [
                    'label' => 'Choisir',
                ],
                'attributes' => [
                    'type' => 'submit',
                ],
            ],
        ],
    ]
];