<?php

namespace Core\Controller;

use Core\Redirect\Redirect;
use Core\Request\Request;
use Core\Response\Response;
use Core\View\View;

class Controller
{

    /**
     * Render error page
     * @param int $status_code
     */
    public function error($status_code)
    {
        Response::setStatusCode($status_code);

        return View::render('error');
    }

    /**
     * Interface for the render function
     */
    public function render($view, $params = [], $layout = 'front')
    {
        return View::render($view, $params, $layout);
    }

    /**
     * Interface for the request object
     */
    public function request()
    {
        return Request::class;
    }

    /**
     * Interface for the redirect object
     */
    public function redirect()
    {
        return Redirect::class;
    }
}
