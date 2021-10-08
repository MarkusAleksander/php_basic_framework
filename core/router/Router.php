<?php

namespace Core\Router;

use App\Http\Controllers\Controller;

use Core\Request\Request;
use Core\Response\Response;

/**
 * Handle routing of the Request
 */

class Router
{

    /**
     * Array of Get and Post route arrays
     */
    protected array $routes = [
        "GET" => [],
        "POST" => []
    ];

    /**
     * Load a Routes file
     */
    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * Resolve the current requested route
     */
    public function resolve()
    {
        $uri = Request::uri();
        $method = Request::method();

        if (array_key_exists($uri, $this->routes[$method])) {

            $controller_action_array = $this->routes[$method][$uri];

            $controller = $controller_action_array[0];
            $action = $controller_action_array[1];

            // * new it up
            $controller = new $controller;

            return $controller->$action();
        }
        // * TODO - Debug toggling
        // * Return base controller 404 error handler
        $controller = new Controller();
        return $controller->error(404);

        throw new \Exception("Route {$method}:{$uri} not found");
    }

    /**
     * Add a Get path and callback to the routes array
     */
    public function get($uri, $callback)
    {
        $this->routes['GET'][$uri] = $callback;
    }

    /**
     * Add a Post path and callback to the routes array
     */
    public function post($uri, $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }
}
