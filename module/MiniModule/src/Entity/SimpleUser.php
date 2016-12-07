<?php
namespace UPJV\MiniModule\Entity;


use Zend\InputFilter\Factory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class SimpleUser implements InputFilterAwareInterface
{
    protected $userName;
    protected $dateInscription;

    protected $inputFilter;

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    /**
     * @param mixed $dateInscription
     */
    public function setDateInscription($dateInscription)
    {
        $this->dateInscription = $dateInscription;
    }

    /**
     * @return InputFilter
     */
    public function getInputFilter() : InputFilter
    {
        if ( !isset( $this->inputFilter )  ) {
            $this->inputFilter = $this->createInputFilter();

        }
        return $this->inputFilter;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        // TODO: Implement setInputFilter() method.
    }

    protected function createInputFilter() : InputFilter
    {
        $inputFilterFactory = new Factory();
        $inputFilter = $inputFilterFactory->createInputFilter(
            [
                'userName' => [
                    'required' => true,
                    'validators' => [
                        [ // def premier validator
                            'name' => \Zend\I18n\Validator\Alpha::class,
                            'options' => [

                            ]
                        ],
                        [ // def deuxième validator
                            'name' => \Zend\Validator\StringLength::class,
                            'options' => [
                                'min' => 3,
                                'max' => 20
                            ]
                        ]
                    ],
                    'filters'  => [
                        [
                            'name' => \Zend\I18n\Filter\Alpha::class
                        ],
                    ],
                ]
            ]
        );
        return $inputFilter;

    }
}