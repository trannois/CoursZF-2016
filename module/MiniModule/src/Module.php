<?php
namespace UPJV\MiniModule;


use UPJV\MiniModule\Controller\IndexController;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\View\Http\ViewManager;
use Zend\Router\Http\Literal;
use Zend\View\Resolver\TemplateMapResolver;

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

        $resolv = new TemplateMapResolver( [
            'error' => __DIR__.'/../view/error.phtml',
            'layout/layout' => __DIR__.'/../view/layout.phtml',
        ]);
        $service->get('ViewPhpRenderer')->setResolver( $resolv );

    }
}