<?php
namespace UPJV\MiniModule\Factory;


use Interop\Container\ContainerInterface;
use Zend\Form\Factory;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormInscriptionFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new Factory();
        return $factory->createForm( include_once __DIR__.'/../../config/formInscription.config.php');
    }
}