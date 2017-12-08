<?php
/**
 * Created by PhpStorm.
 * User: harold
 * Date: 06/12/2017
 * Time: 09:51
 */

namespace UPJV\DbModule\Entity;


use Zend\I18n\Validator\Alpha;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\Date;

class Client implements InputFilterAwareInterface
{
    protected $nom;
    protected $date;
    protected $password;

    protected $inputFilter;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getInputFilter() : InputFilter
    {
        // TODO: Implementer toutes les validator pour chaque champ.
        if ( !isset( $this->inputFilter )  ) {
            $this->inputFilter = new InputFilter();
            $this->inputFilter->add([
                'name' => 'nom',
                'required' => true,
                'validators' => [
                    ['name' => Alpha::class],
                ]]);
            $this->inputFilter->add([
                'name' => 'date',
                'required' => true,
                'validators' => [
                    ['name' => Date::class, 'options' => [ 'format' => 'Y-m-d']],
                ]
            ]);
        }
        return $this->inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        // TODO: Implement setInputFilter() method.
    }
}