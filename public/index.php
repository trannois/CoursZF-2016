<?php
require_once __DIR__.'/../vendor/autoload.php';

try {
    \Zend\Mvc\Application::init(include __DIR__ . '/../config/application.config.php');
} catch ( \RuntimeException $e ) {
    echo $e->getMessage();
}