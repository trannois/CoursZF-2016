<?php
namespace UPJV\AuthModule\Factory;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class AclFactory implements FactoryInterface
{

    /**
     * Create an object
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
        $conf = require_once __DIR__.'/../../config/auth.config.php';
        $acl = new Acl();

        $this->addRole( $conf['role'], $acl );
        foreach ( $conf['allow'] as $role => $controllers ) {
            $acl->allow($role, null, $controllers );
        }
        return $acl;
    }

    /**
     * Ajoute récursivement les roles
     * chaque role Pere hérite des possibilités du fils
     * @param $conf
     * @param Acl $acl
     */
    private function addRole( $conf, Acl $acl )
    {
        foreach ( $conf as $role => $rolePere ){
            $acl->addRole( new GenericRole( $role ) );
            if ( $rolePere !== null ) {
                $this->addRole($rolePere, $acl);
            }
        }
    }
}