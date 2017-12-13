<?php
namespace UPJV\AuthModule\Model;


use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

/**
 * Class Auth
 * Implémentation d'une authentification en dur
 * @package UPJV\AuthModule\Model
 */
class Auth implements AdapterInterface
{
    const LOGIN = "Tintin";

    protected $login;

    public function __construct( $login )
    {
        $this->login = $login;
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
        if ( $this->login === self::LOGIN ) {
            $code = Result::SUCCESS;
            $identity = self::LOGIN;
        } else {
            $code = Result::FAILURE;
        }

        return new Result( $code, $identity );
    }
}