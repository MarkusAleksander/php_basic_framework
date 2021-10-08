<?php

namespace App\Http\Controllers;

use App\Model\User;
use Core\Controller\Controller;

class SiteController extends Controller
{
    public function home()
    {
        $params = $this->request()::query();

        $this->render('front/index', ["params" => $params]);
    }

    public function products()
    {
        $this->render('front/products');
    }

    public function product()
    {
        $this->render('front/product');
    }

    public function contact()
    {
        $this->render('front/contact');
    }

    public function handleContactSubmit()
    {
        $body = $this->request()::body();

        $this->redirect()::to('contact');
    }
}
