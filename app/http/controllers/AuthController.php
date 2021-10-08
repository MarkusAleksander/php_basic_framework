<?php

namespace App\Http\Controllers;

use Core\Controller\Controller;
use Core\Validator\Validator;

class AuthController extends Controller
{

    public function login()
    {
        $this->render('front/login', [], 'auth');
    }

    public function handleLogin()
    {
        // ...
    }

    public function register()
    {
        $this->render('front/register', [], 'auth');
    }

    public function handleRegister()
    {
        $body = $this->request()::body();

        // * Create Validator
        $validator = new Validator(array(
            "first_name" => array('required', "First Name"),
            "last_name" => array('required', "Last Name"),
            "email" => array('required', "Email"),
            "password" => array('required', "Password"),
            "confirm_password" => array('required|matches:password', "Confirm Password"),
        ), $body);

        // * Validate 
        if (!$validator->isValid()) {
            // * Has errors
            $this->render('front/register', ['errors' => $validator->getErrors()], 'auth');
            return;
        }

        // $user = new User();

        // die(var_dump($body));
    }

    public function logout()
    {
        // ...
    }
}
