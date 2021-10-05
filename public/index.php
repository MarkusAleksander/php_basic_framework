<?php

/**
 * Entry point to the application
 * 
 * 1) Include autoload
 * 2) Begin bootstrap set up
 * 3) Load Router and direct to current URI
 */

require_once __DIR__ . '/../vendor/autoload.php';

require_once '../bootstrap/bootstrap.php';


$app->get('router')->direct(
    $app->get('request')::uri(),
    $app->get('request')::method()
);
