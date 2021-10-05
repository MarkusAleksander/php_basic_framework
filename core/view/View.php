<?php

namespace Core\View;

/**
 * Class for handling views
 */

class View
{

    static $view_root = "app/views/";

    /**
     * Make view from named view file and pass in data
     */
    public static function make($name, $data = [])
    {
        extract($data);

        $root = static::$view_root;

        return require "../{$root}{$name}.view.php";
    }
}
