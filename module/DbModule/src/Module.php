<?php
namespace UPJV\DbModule;


use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;

class Module implements BootstrapListenerInterface
{
    public function getConfig()
    {
        return include_once __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        // ajoute un action dans la pile des actions à faire lors de l'évenement RENDER
        $e->getTarget()->getEventManager()->attach(
            MvcEvent::EVENT_DISPATCH,
            function ( MvcEvent $e) {
                if ($e->getRouteMatch()->getMatchedRouteName() == 'db') {
                    $vm = $e->getTarget()->getServiceManager()->get('ViewManager');
                    $viewModel = $vm->getViewModel();

                    $menu = new ViewModel();
                    $menu->setTemplate('db/menu');

                    $viewModel->addChild($menu, 'menuDb');
                }
            },
            100000
        );
    }

}