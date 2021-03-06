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
    public static function query()
    {
        if (static::method() !== "GET") {
            throw new \Exception("Incorrect Request Type for query");
        }

        // * sanitize post data
        $body = [];

        foreach ($_GET as $key => $value) {
            $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }

    // * Get the post request params
    public static function body()
    {
        if (static::method() !== "POST") {
            throw new \Exception("Incorrect Request Type for body");
        }

        // * sanitize post data
        $body = [];

        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}
