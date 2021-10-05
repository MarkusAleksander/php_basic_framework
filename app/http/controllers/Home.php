<?php

namespace App\Http\Controllers;

use Core\View\View;
use Core\Request\Request;

class Home
{
    public function index()
    {
        $params = Request::get_params();

        View::make('index', ["params" => $params]);
    }
}
