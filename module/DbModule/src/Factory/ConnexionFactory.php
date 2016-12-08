<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 08/12/2016
 * Time: 16:02
 */

namespace UPJV\DbModule\Factory;


use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ConnexionFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        if (!array_key_exists('db', $config)) {
            throw new ServiceNotFoundException('service db pas trouvé');
        }
        return new Adapter($config['db']);
    }

}