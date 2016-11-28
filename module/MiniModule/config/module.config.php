<?php
return [
  'router' => [
      'routes' => [
          'home' => [
              'type' => \Zend\Router\Http\Regex::class,
              'options' => [
                  'regex' => '/(?<action>[a-z|A-Z]+)',
                  'spec' => '/%action%',
                  'defaults' => [
                      'controller' => 'index',
                  ]
              ]
          ]
      ]
  ]
];