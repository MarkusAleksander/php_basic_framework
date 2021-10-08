<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;

$router->get('', [SiteController::class, 'home']);

$router->get('login', [AuthController::class, 'login']);
$router->post('login', [AuthController::class, 'handleLogin']);
$router->get('register', [AuthController::class, 'register']);
$router->post('register', [AuthController::class, 'handleRegister']);

$router->get('products', [SiteController::class, 'products']);
$router->get('product', [SiteController::class, 'product']);
$router->get('contact', [SiteController::class, 'contact']);
$router->post('contact', [SiteController::class, 'handleContactSubmit']);

// $router->post();