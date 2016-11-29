<?php
namespace UPJV\MiniModule;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\MvcEvent;

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