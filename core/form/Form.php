<?php

namespace Core\Form;

/**
 * Generate HTML for a form
 */
class Form
{
    /**
     * Create opening tag for the form and return a new instance
     */
    public static function begin($action, $method, $class = "", $encType = "application/x-www-form-urlencoded")
    {
        echo sprintf('<form class="%s" action="%s" method="%s" entype="%s">', $class, $action, $method, $encType);
        return new Form();
    }

    /**
     * Create the closing tag for the form
     */
    public static function end()
    {
        return '</form>';
    }

    public function createField($field_data)
    {
        $field = new Field($field_data);
        echo $field->createField();
    }
}
