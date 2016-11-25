<?php
namespace UPJV\MiniModule;


use UPJV\MiniModule\Controller\IndexController;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\Router\Http\Literal;

class Module implements BootstrapListenerInterface
{
    public function onBootstrap(EventInterface $e)
    {
        $service = $e->getTarget()->getServiceManager();

        $route = Literal::factory(array(
                'route'     =>  '/',
                'defaults'  =>  array(
                    'controller'    =>  'index',
                    'action'        =>  'index'
                )
            )
        );
        $service->get('router')->addRoute( 'home', $route );

        $service->get('ControllerManager')->setService('index', new IndexController());
    }
}