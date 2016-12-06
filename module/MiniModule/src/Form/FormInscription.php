<?php

namespace UPJV\MiniModule\Form;


use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class FormInscription extends Form
{
    public function __construct()
    {
        parent::__construct('inscription');
        $this->add(
            [
                'type' => Text::class,
                'name' => 'log',
                'attributes' => [
                    'size' => '20',
                ],
                'options' => [
                    'label' => 'Login : ',
                ],
            ]
        );
        $this->add(
            [
                'type' => Submit::class,
                'name' => 'submit',
                'attributes' => [
                    'value' => 'Suite',
                ],
            ]
        );
    }
}