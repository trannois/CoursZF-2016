<?php
namespace UPJV\DbModule;


use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\View\Model\ViewModel;

class Module implements BootstrapListenerInterface
{
    public function getConfig()
    {
        return include_once __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {

    }

}