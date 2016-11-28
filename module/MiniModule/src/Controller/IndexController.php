<?php
namespace UPJV\MiniModule\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = $this->getEvent()->getViewModel();
        $view->setTemplate('index');
        $view->setVariables([ "hop" => "Youpi" ]);
        return $view;
    }

    public function ligneAction()
    {
        $view = new ViewModel();
        $view->setTemplate('index');
        $view->setVariables([ "hop" => "Avec la ligne graphique" ]);
        $this->getEvent()->getViewModel()->addChild($view, 'content');
        return $view;
    }
}