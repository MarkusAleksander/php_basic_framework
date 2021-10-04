<?php

namespace Core;

/**
 * Manage Requests into the app
 */

class Request
{

    // * get the request URI
    public static function uri()
    {
        // * trim the URI and return the flagged segment (no query params)
        return trim(
            parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH),
            '/'
        );
    }

    // * get the request METHOD
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // * Get the request parameters
    public static function params()
    {
    }
}