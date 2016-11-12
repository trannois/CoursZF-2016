<?php
namespace UPJV\CoursZF\Resources;

/**
 * Class CarteGrise
 * encapsule les informations d'une carte grise
 * @package UPJV\CoursZF\Cours
 */
class CarteGrise
{
    protected $numero;

    /**
     * CarteGrise constructor.
     * Affecte un numéro à la carte grise par défaut
     */
    function __construct( $num = null )
    {
        if ( $num === null )
            $this->setNumero( uniqid() );
    }

    /**
     * Renvoie le numéro de la carte grise
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Modifie le numéro de la carte grise
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
}