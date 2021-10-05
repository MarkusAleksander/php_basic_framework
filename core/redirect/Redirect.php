<?php

namespace Core\Redirect;

/**
 * Manage Redirects
 */

class Redirect
{

    public static function to($path)
    {
        header("Location: /{$path}");
    }
}
