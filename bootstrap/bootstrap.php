<?php

use Core\App\App;
use Core\Router\Router;
use Core\Response\Response;
use Core\Database\{QueryBuilder, Connection};

/**
 * Begin bootstrapping the app
 * Define some constants
 * Set up the required services to run
 * */

// * Create new app
$app = new App(__DIR__ . '/../');

// * Load the .env file
$dotenv = Dotenv\Dotenv::createImmutable(App::$APP_ROOT);
$dotenv->load();


// * Assign router to the app
$app->setRouter(Router::load(App::$APP_ROOT . '/routes/routes.php'));


// * Assign Query Builder to the app
$database = require App::$APP_ROOT . "/config/database.php";

$app->setDBConnection(Connection::make($database['database']));

$app->setQueryBuilder(new QueryBuilder(
    $app->connection()
));


// * Assign response object to the app
// $app->setResponse(new Response());

return $app;

// $app->bind('resolve_root_dir', function ($path) {
//     return APP_ROOT . $path;
// });

// //  * Inject dependencies to the App
// $app->bind('db_config', require APP_ROOT . "/config/database.php");

// // // * Attempt to connect to the database
// $app->bind('database', new QueryBuilder(
//     Connection::make($app->get('db_config')['database'])
// ));

// // * Bind router and request
// $app->bind('router', Router::load($app->get('resolve_root_dir')("/routes/routes.php")));
// $app->bind('request', Request::class);

// return $app;

// $router = Router::load(APP_ROOT . 'routes/routes.php');
