<?php

use Core\App;
use Core\Database\{QueryBuilder, Connection};

use Core\Router\Router;
use Core\Request\Request;

/**
 * Begin bootstrapping the app
 * Define some constants
 * Set up the required services to run
 * */

define('APP_ROOT', __DIR__ . '/../');

// * Load the .env file
$dotenv = Dotenv\Dotenv::createImmutable(APP_ROOT);
$dotenv->load();

$app = new App;

$app->bind('resolve_root_dir', function ($path) {
    return APP_ROOT . $path;
});

//  * Inject dependencies to the App
$app->bind('db_config', require $app->get('resolve_root_dir')("/config/database.php"));

// * Attempt to connect to the database
$app->bind('database', new QueryBuilder(
    Connection::make($app->get('db_config')['database'])
));

// * Bind router and request
$app->bind('router', Router::load($app->get('resolve_root_dir')("/routes/routes.php")));
$app->bind('request', Request::class);

return $app;
