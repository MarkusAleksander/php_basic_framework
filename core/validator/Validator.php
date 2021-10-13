<?php

namespace Core\Validator;

class Validator
{

    /**
     * Validation config
     */
    private array $config;

    /**
     * Cache validation result
     */
    private bool $is_valid;

    /**
     * Store date to be validated
     */
    private array $data;

    /**
     * Store errors
     */
    private array $errors = [];

    /**
     * Construct with validation configuration
     */
    public function __construct(array $config, array $data)
    {
        $this->config = $config;
        $this->data = $data;
    }

    /**
     * Check Validator is valud
     */
    public function isValid()
    {
        // * Return valid status if already validated
        if (isset($this->is_valid)) {
            return $this->is_valid;
        }

        // * set as initially true
        $this->is_valid = true;

        // * loop through config
        foreach ($this->config as $item => $validation_config) {
            // * get validation requirements
            $requirements = explode('|', $validation_config[0]);

            // * if name isn't passed, set name to $item
            $name = isset($validation_config[1]) ? $validation_config[1] : $item;

            // * loop through requirements
            foreach ($requirements as $r) {
                // * Get action from extra data
                $action = explode(":", $r)[0];

                if (!$name) $name = $item;

                $this->$action($item, $r, $name);
            }
        }

        return $this->is_valid;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Determine if required property is provided
     */
    private function required($item, $r = "", $name = "")
    {
        // * check key is in data
        if (!array_key_exists($item, $this->data)) {
            throw new \Exception("Attempting to validate key {$item} not in data");
        }

        // * if value in data is empty, then we have an error
        if (empty($this->data[$item])) {
            // * Push to error list
            $this->errors[$item][] = "{$name} is required";
            $this->is_valid = false;
        }
    }

    /**
     * Determine if property matches another property
     */
    private function matches($item, $r, $name = "")
    {
        // * check key is in data
        if (!array_key_exists($item, $this->data)) {
            throw new \Exception("Attempting to validate key {$item} not in data");
        }

        // * Get item to match against
        $key_to_match_against = explode(":", $r)[1];

        // * check matching key is in data
        if (!array_key_exists($key_to_match_against, $this->data)) {
            throw new \Exception("Cannot find key {$key_to_match_against} in data");
        }

        if ($this->data[$item] !== $this->data[$key_to_match_against]) {
            // * Push to error list
            $this->errors[$item][] = "{$name} does not match {$key_to_match_against}";
            $this->is_valid = false;
        }
    }

    /**
     * Determine if property has a max size
     */
    private function max($item, $r, $name = "")
    {
        $value_to_compare_against = explode(":", $r)[1];

        if (strlen($this->data[$item]) > $value_to_compare_against) {
            // * Push to error list
            $this->errors[$item][] = "{$name} must be no larger than {$value_to_compare_against} characters";
            $this->is_valid = false;
        }
    }

    /**
     * Determine if property has a min size
     */
    private function min($item, $r, $name = "")
    {
        $value_to_compare_against = explode(":", $r)[1];

        if (strlen($this->data[$item]) < $value_to_compare_against) {
            // * Push to error list
            $this->errors[$item][] = "{$name} must be greater than {$value_to_compare_against} characters";
            $this->is_valid = false;
        }
    }

    /**
     * Check is Email
     */
    private function email($item, $r, $name = "")
    {
        if (!filter_var(trim($this->data[$item]), FILTER_VALIDATE_EMAIL)) {
            // * Push to error list
            $this->errors[$item][] = "{$name} must be a valid email";
            $this->is_valid = false;
        }
    }
}
