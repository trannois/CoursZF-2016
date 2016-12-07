<?php
namespace UPJV\MiniModule\Entity;


class SimpleUser
{
    protected $userName;
    protected $dateInscription;

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
     * Par defaut \Zend\Hydrataor\ArraySerializable extrait les valeurs via la méthode getArrayCopy().
     * Donc il faut définir cette méthode pour pouvoir lier un objet à un formulaire
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'userName' => $this->getUserName(),
            'dateInscription' => $this->getDateInscription()
        ];
    }

    /**
     * Hydrates an object by passing $data to either its exchangeArray() or populate() method.
     * @param array $data
     */
    public function populate( $data )
    {
        if ( array_key_exists( 'userName', $data ) ) {
            $this->setUserName( $data['userName']);
        }
        if ( array_key_exists( 'dateInscription', $data )) {
            $this->setDateInscription($data['dateInscription']);
        }
    }
}