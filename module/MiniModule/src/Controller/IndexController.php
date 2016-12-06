<?php
namespace UPJV\MiniModule\Controller;

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

    public function formDateAction() {
        $form = $this->getEvent()->getApplication()->getServiceManager()->get('MiniModule\FormInscription');
        $form->setAttribute( 'methode', 'post');

        if ( $this->getRequest()->isPost() ) {
            $form->setData($this->getRequest()->getPost() );
            if ($form->isValid()) {
                return $this->redirect()->toRoute('home', ['action'=>'index']);
            }
        }
        return [ 'form' => $form ];
    }
}