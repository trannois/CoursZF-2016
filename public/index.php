<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = \Zend\Mvc\Application::init(include __DIR__ . '/../config/application.config.php');
$app->run();