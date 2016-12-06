<?php
namespace UPJV\MiniModule\Controller;

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
    public function formInscriptionAction()
    {
        $form = new \UPJV\MiniModule\Form\FormInscription();
        return array( 'loginForm' => $form );
    }
}