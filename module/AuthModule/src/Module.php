<?php
namespace UPJV\AuthModule;

use UPJV\AuthModule\Model\Auth;
use Zend\EventManager\EventInterface;
use Zend\Http\PhpEnvironment\Request;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package UPJV\AuthModule
 */
class Module implements ConfigProviderInterface, BootstrapListenerInterface, ServiceProviderInterface
{

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return require_once __DIR__.'/../config/module.config.php';
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     */
    public function onBootstrap(EventInterface $e)
    {
        // ajoute un action à la fin de la reconnaissance de la route
        $e->getTarget()->getEventManager()->attach(
            MvcEvent::EVENT_ROUTE,
            function ( MvcEvent $e) {
                $controller = $e->getRouteMatch()->getParam('controller');
                $controllerSousSurveillance = $e->getApplication()->getServiceManager()->get('auth');
                if ( in_array($controller, $controllerSousSurveillance))
                {
                    // Attention !!! c'est juste pour le test, les paramètres GET sont annalysés par le router normalement
                    $ident = $_GET['ident'];
                    $authAdapter = new Auth( $ident );
                    if ( ! $authAdapter->authenticate()->isValid() ){
                        $e->getRouteMatch()->setMatchedRouteName('auth/error');
                        $e->getRouteMatch()->setParam('controller', 'auth/index');
                        $e->getRouteMatch()->setParam('action', 'error');
                    }
                }
            },
            -100
        );
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * Lit la configuration du control d'accès
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return require_once __DIR__.'/../config/auth.config.php';
    }
}