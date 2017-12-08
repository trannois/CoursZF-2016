<?php
namespace UPJV\MiniModule\Controller;

use UPJV\MiniModule\Entity\SimpleUser;
use Zend\Form\Form;
use Zend\Hydrator\ClassMethods;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Http\Request;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        error_log('ok');
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

    /**
     * Récupère les données du formulaire
     * Si elles sont bonnes on hydrate l'objet SimpleUser avec.
     * @return array|\Zend\Http\Response
     */
    public function formDateAction()
    {
        $form = $this->getEvent()->getApplication()->getServiceManager()->get('MiniModule\FormInscription');
        $form->setAttribute( 'methode', 'post');
        if ( $this->getRequest()->isPost() ) {
            $newUser = new SimpleUser();
            $form->setHydrator( new ClassMethods( false ));
            $form->bind($newUser);
            $form->setData($this->getRequest()->getPost() );
            if ($form->isValid()) {
                return $this->redirect()->toRoute('home', ['action'=>'index']);
            }
        }
        return [ 'form' => $form ];
    }
}