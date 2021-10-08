<?php

namespace Core\View;

use Core\App\App;

/**
 * Class for handling views
 */

class View
{

    static $view_root = "app/views/";

    /**
     * Render view by composing the view content, data and view layout
     */
    public static function render($name, $data, $layout)
    {
        $renderedLayout = self::renderLayout($layout, $data);
        $renderedContent = self::renderContent($name, $data);

        $view = str_replace('{{content}}', $renderedContent, $renderedLayout);
        echo $view;
    }

    /**
     * Render the Layout part of the view
     */
    private static function renderLayout($layout, $data = [])
    {
        extract($data);
        // * Create path root
        $root = static::$view_root . 'layouts/';
        ob_start();
        require_once App::$APP_ROOT . "/{$root}{$layout}.view.php";
        return ob_get_clean();
    }

    /**
     * Render the content part of the view
     */
    private static function renderContent($name, $data = [])
    {
        extract($data);
        // * Create path root
        $root = static::$view_root;
        ob_start();
        require_once App::$APP_ROOT . "/{$root}{$name}.view.php";
        return ob_get_clean();
    }
}
