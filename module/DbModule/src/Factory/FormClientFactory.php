<?php
namespace UPJV\DbModule\Factory;


use Interop\Container\ContainerInterface;
use Zend\Form\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormClientFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new Factory();
        return $factory->createForm( include_once __DIR__.'/../../config/formClient.config.php');
    }
}