<?php

namespace Core;

/**
 * Handle routing of the Request
 */

class Router
{

    // * Routes array to populate
    protected $routes = [
        "GET" => [],
        "POST" => []
    ];

    // * load route data into $routes
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    // * direct to appropriate route
    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

        throw new \Exception('Route not found');
    }

    protected function callAction($controller, $action)
    {
        // * Reference controller namespace
        $controller = "App\\Controllers\\{$controller}";

        // * new it uo
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception("Method {$action} doesn't exist on controller {$controller}");
        }

        // * return results of controller
        return $controller->$action();
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
}
