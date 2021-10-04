<?php

namespace Core;

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
