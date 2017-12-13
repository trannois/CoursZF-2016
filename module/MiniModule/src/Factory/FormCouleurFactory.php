<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 11/12/2017
 * Time: 16:15
 */

namespace UPJV\MiniModule\Factory;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Form\Factory;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class FormCouleurFactory implements FactoryInterface
{

    /**
     * Créer une instance de la class Zend\Form\Form à partir la déscription donnée dans le fichier de configuration
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new Factory();
        $form = $factory->createForm( require_once __DIR__.'/../../config/formCouleur.config.php' );
        return $form;
    }
}