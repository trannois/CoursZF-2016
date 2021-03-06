<?php
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

require_once __DIR__.'/../vendor/autoload.php';

$route = new Zend\Router\Http\Regex( '/(?<obj>[a-z|A-Z]+)', '/%obj%');

$router = new Zend\Router\SimpleRouteStack();
$router->addRoute( 'uneRoute', $route );



$requette = new Zend\Http\Request();
$requette->setUri($url);

$routeMatch = $router->match( $requette );
if ( $routeMatch !== null ) {
    echo "Cette url est reconnue\n";
    echo "Route : [".$routeMatch->getMatchedRouteName()."]\n";
    echo "Param : [".$routeMatch->getParam('obj')."]\n";
}
else
    echo "pas reconnue\n";

