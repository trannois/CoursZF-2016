<?php
namespace UPJV\MiniModule\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return [ "message" => "Youpi" ];
    }

}