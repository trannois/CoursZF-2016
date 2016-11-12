<?php
namespace UPJV\CoursZF\Listeners;


use Zend\EventManager\Event;

/**
 * Class MyAction
 * Ensembles d'action
 * @package UPJV\CoursZF\Listeners
 */
class MyAction
{
    /**
     * Affiche les informations sur la carte grise
     * @param Event $e
     */
    function Affiche( Event $e )
    {
        echo "Réaction à l'événement ".__CLASS__."\n";
        $carte = $e->getParam('service')->get('carteGrise');
        echo "N° de la carte Grise : ".$carte->getNumero()."\n";
    }

}