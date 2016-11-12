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
     * Affiche le nom de la classe
     * @param Event $e
     */
    function Affiche( Event $e )
    {
        echo "Réaction à l'événement ".__CLASS__."\n";
    }

}