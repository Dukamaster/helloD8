<?php

namespace Drupal\hello\Routing;

use Symfony\Component\Routing\Route;

class HelloRoutes
{
  public function getRoutes()
    {
      $routes = [];
      $routes['hello.dynamic_route'] = new Route(
        '/helloRoute',
        [
          '_content' => '\Drupal\hello\Controller\HelloController::helloWorld',
          'title' => 'Dynamic Router',
        ],
        ['_permission' => 'access content']
      );

      return $routes;
    }
}