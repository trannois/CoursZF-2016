<?php
namespace UPJV\MiniModule\Controller;


use Zend\Form\Element;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Factory;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return [ "hop" => "Youpi" ];
    }

    public function ligneAction()
    {
        $view = new ViewModel();
        $view->setTemplate('index');
        $view->setVariables([ "hop" => "Ligne" ]);
        return $view;
    }
    public function adresseAction()
    {
        return [ "nom"=> "Herge", "prenom" => "Tintin"];
    }

    /**
     * @return array
     */
    public function formdateAction()
    {
        $configForm = array(
            'elements' => array(
                // la saisie du login (type text)
                array(
                    'spec' => array(
                        'type' => Text::class,
                        'name' => 'log',
                        'attributes' => array(
                            'size' => '20',
                        ),
                        'options' => array(
                            'label' => 'Login : ',
                        ),
                    ),
                ),
                // champ date non obligatoire pour illustrer l'inclusion de script JS
                // ici le champ date sera un datepicker de JQuery
                [
                  'spec' => [
                      'type' => Element\Date::class,
                      'name' => 'dateInscription',
                      'options' => [
                          'label' => 'Date d\'inscription : ',
                      ],
                  ],
                ],
                // le boutton de validation
                array(
                    'spec' => array(
                        'type' => Submit::class,
                        'name' => 'submit',
                        'attributes' => array(
                            'value' => 'Suite',
                        ),
                    ),
                ),
            ),
        );

        $factory = new Factory();
        $form = $factory->createForm( $configForm );
        return array( 'loginForm' => $form );
    }
}