<?php

namespace Core\Request;

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

    // * Get the get request parameters
    public static function get_params()
    {
        if (static::method() !== "GET") {
            throw new \Exception("Incorrect Request Type for params");
        }
        return $_GET;
    }

    // * Get the post request params
    public static function post_params()
    {
        if (static::method() !== "POST") {
            throw new \Exception("Incorrect Request Type for params");
        }
        return $_POST;
    }
}
