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
     * Static instance of the app
     */
    public static App $app;

    /**
     * Router Instance
     */
    private Router $router;

    /**
     * Query Builder instance
     */
    private QueryBuilder $query_builder;

    /**
     * Database Connection instance
     */
    private \PDO $db_connection;

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
        self::$app = $this;
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
     * Set DB Connection
     */
    public function setDBConnection(\PDO $db_connection)
    {
        $this->db_connection = $db_connection;
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

    public function connection()
    {
        return $this->db_connection;
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
