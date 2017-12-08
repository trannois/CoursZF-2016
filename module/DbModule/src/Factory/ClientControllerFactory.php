<?php

namespace UPJV\DbModule\Factory;


use Interop\Container\ContainerInterface;
use UPJV\DbModule\Controller\ClientController;
use Zend\ServiceManager\Factory\FactoryInterface;

class ClientControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adaptator= $container->get('DbModule/Db');
        $formClient = $container->get('Form/Client');
        $formClient->setAttribute( 'methode', 'post');
        return new ClientController( $adaptator, $formClient );

    }
}