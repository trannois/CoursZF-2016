<?php
namespace UPJV\AuthModule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 * @package UPJV\AuthModule
 */
class Module implements ConfigProviderInterface
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
}