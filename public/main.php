<?php
require_once __DIR__.'/../vendor/autoload.php';

$sm = new \Zend\ServiceManager\ServiceManager();
$sm->setService('carteGrise', new \UPJV\CoursZF\Resources\CarteGrise() );

$evmg = new \Zend\EventManager\EventManager();

$evmg->attach('affiche', array(new \UPJV\CoursZF\Listeners\MyAction(), "Affiche"));
$evmg->trigger('affiche', null, ['service'=>$sm]);