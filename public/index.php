<?php

/**
 * Entry point to the application
 * 
 * 1) Include autoload
 * 2) Begin bootstrap set up
 * 3) Run app
 */

require_once __DIR__ . '/../vendor/autoload.php';

// * Bootstrap
$app = require_once '../bootstrap/bootstrap.php';

// * Run
$app->run();
