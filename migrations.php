<?php

use Core\Database\Migration;
use Core\Database\{QueryBuilder, Connection};

require_once __DIR__ . '/vendor/autoload.php';

// * Load the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$database = require __DIR__ . "/config/database.php";

// $migration
$migration = new Migration(__DIR__, new QueryBuilder(
    Connection::make($database['database'])
));

$migration->applyMigrations();
