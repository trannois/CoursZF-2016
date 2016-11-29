<?php
require_once __DIR__.'/../vendor/autoload.php';

$vm = new \Zend\View\Model\ViewModel();
$vm->setVariables( array('nom' => 'tintin'));
$vm->setTemplate( 'liste' );

$resolv = new \Zend\View\Resolver\TemplateMapResolver( [ 'liste' => __DIR__ . '/../src/view/template/layout.phtml']);

$rendu = new \Zend\View\Renderer\JsonRenderer();
$rendu->setResolver($resolv);
echo $rendu->render( $vm );