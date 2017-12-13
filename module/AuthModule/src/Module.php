<?php
namespace UPJV\AuthModule;

use UPJV\AuthModule\Model\Auth;
use Zend\Authentication\AuthenticationService;
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
class Module implements ConfigProviderInterface, BootstrapListenerInterface
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
                $authService = new AuthenticationService();
                if ( isset($_GET['ident'])) {
                    // Attention !!! c'est juste pour le test, les paramètres GET sont annalysés par le router normalement
                    $ident = $_GET['ident'];
                } elseif ( $authService->hasIdentity() ) {
                    $ident = $authService->getIdentity();
                } else {
                    $ident ='';
                }
                $acl = $e->getApplication()->getServiceManager()->get('auth/acl');
                $controller = $e->getRouteMatch()->getParam('controller');
                $authAdapter = new Auth($ident, $acl, $controller);
                $result = $authService->authenticate($authAdapter);
                if (!$result->isValid()) {
                    $e->getRouteMatch()->setMatchedRouteName('auth/error');
                    $e->getRouteMatch()->setParam('controller', 'auth/index');
                    $e->getRouteMatch()->setParam('action', 'error');
                }
            },
            -100
        );
    }
}