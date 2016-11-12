<?php
require_once __DIR__.'/../vendor/autoload.php';

$evmg = new \Zend\EventManager\EventManager();

$evmg->attach('affiche', array(new \UPJV\CoursZF\Listeners\MyAction(), "Affiche"));
$evmg->trigger('affiche');