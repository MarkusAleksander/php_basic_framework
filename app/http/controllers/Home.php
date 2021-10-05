<?php

namespace App\Http\Controllers;

use Core\View\View;

class Home
{
    public function index()
    {
        View::make('index');
    }
}
