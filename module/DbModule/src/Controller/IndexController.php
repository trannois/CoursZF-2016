<?php
namespace UPJV\DbModule\Controller;


use Zend\Db\Adapter\Adapter;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $db = $this->getEvent()->getApplication()->getServiceManager()->get('DbModule\Db');
        return ['flag'=>( $db instanceof Adapter ) ];
    }

}