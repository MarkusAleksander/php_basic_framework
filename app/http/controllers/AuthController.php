<?php

namespace App\Http\Controllers;

use Core\Controller\Controller;
use Core\Validator\Validator;
use App\Models\User;

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
            "first_name" => array('required|min:2', "First Name"),
            "last_name" => array('required|min:2', "Last Name"),
            "email" => array('required|email', "Email"),
            // "email" => array('required|email', "Email"),
            "password" => array('required|min:6|max:14', "Password"),
            "confirm_password" => array('required|matches:password', "Confirm Password"),
        ), $body);

        // * Validate 
        if (!$validator->isValid()) {
            // * Has errors
            $this->render('front/register', ['errors' => $validator->getErrors(), 'input' => $body], 'auth');
            return;
        }

        // * Generate a User modal
        $user = new User();
        $user->loadData($body);

        // $user = new User();


        // * Redirect to logged in form
    }

    public function logout()
    {
        // ...
    }
}
