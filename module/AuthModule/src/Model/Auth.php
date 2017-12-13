<?php
namespace UPJV\AuthModule\Model;


use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Zend\Permissions\Acl\Acl;

/**
 * Class Auth
 * Implémentation d'une authentification en dur
 * @package UPJV\AuthModule\Model
 */
class Auth implements AdapterInterface
{
    const LOGIN = "Tintin";

    protected $login;
    protected $role;
    protected $acl;
    protected $controller;

    public function __construct( $login, Acl $acl, $controller )
    {
        if ($login === self::LOGIN) {
            $this->role = 'admin_db';
        } else {
            $this->role = 'anonyme';
        }
        $this->login = $login;
        $this->acl = $acl;
        $this->controller = $controller;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $identity = "";
        if ( $this->acl->isAllowed($this->role, null, $this->controller ) ) {
            $code = Result::SUCCESS;
            $identity = $this->login;
        } else {
            $code = Result::FAILURE;
        }

        return new Result( $code, $identity );
    }
}