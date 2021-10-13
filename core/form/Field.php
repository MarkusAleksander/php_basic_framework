<?php

namespace Core\Form;

/**
 * Generate HTML for a Form Field
 */
class Field
{

    private $field_data;

    public function __construct($field_data)
    {
        $this->field_data = $field_data;
    }

    public function createField()
    {
        return $this->openFieldTag() . $this->createInput() . $this->createLabel() . $this->closeFieldTag();
    }

    private function openFieldTag()
    {
        return sprintf('<div class="%s">', $this->field_data['field_class']);
    }

    private function closeFieldTag()
    {
        return '</div>';
    }

    private function createInput()
    {
        $input_class = $this->field_data['input_class'] . " " . ($this->field_data['is_valid'] ? $this->field_data['input_error_class'] : "");

        return "<input
            placeholder=\"{$this->field_data['placeholder']}\"
            id=\"{$this->field_data['name']}\"
            name=\"{$this->field_data['name']}\"
            type=\"{$this->field_data['type']}\"
            class=\"{$input_class}\"
            value=\"{$this->field_data['input']}\"
        />";
    }

    private function createLabel()
    {
        return sprintf('<label for="%s">%s</label>', $this->field_data['name'], $this->field_data['label']);
    }
}
