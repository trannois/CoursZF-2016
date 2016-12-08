<?php

namespace UPJV\DbModule\Factory;


use Interop\Container\ContainerInterface;
use UPJV\DbModule\Controller\IndexController;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IndexController( $container->get('DbModule\Db') );
    }
}