<?php

namespace Core;

/**
 * Class for handling views
 */

class View
{

    static $view_root = "src/views/";

    /**
     * Make view from named view file and pass in data
     */
    public static function make($name, $data = [])
    {
        extract($data);

        return require "{static:$view_root}{$name}.view.php";
    }
}
