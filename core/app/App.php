<?php

namespace Core\App;

use Core\Router\Router;
use Core\Response\Response;
use Core\Database\QueryBuilder;

/**
 * Container for the App
 * Uses Dependency Injection
 */

class App
{

    /**
     * Router Instance
     */
    private Router $router;

    /**
     * Query Builder instance
     */
    private QueryBuilder $query_builder;

    /**
     * Response instance
     */
    // private Response $response;

    /**
     * App Root
     */
    public static string $APP_ROOT;


    public function __construct($APP_ROOT)
    {
        self::$APP_ROOT = $APP_ROOT;
    }

    /**
     * Set Router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Set QueryBuilder
     */
    public function setQueryBuilder(QueryBuilder $query_builder)
    {
        // * Assign Query Builder
        $this->query_builder = $query_builder;
    }

    /**
     * Set Response
     */
    // public function setResponse(Response $response)
    // {
    //     $this->response = $response;
    // }

    /**
     * Get Router instance
     */
    public function router()
    {
        return $this->router;
    }

    /**
     * Get QueryBuilder instance
     */
    public function query()
    {
        return $this->query_builder;
    }

    // public function response()
    // {
    //     return $this->response;
    // }

    /**
     * Run the app
     */
    public function run()
    {
        $this->router->resolve();
    }
}
