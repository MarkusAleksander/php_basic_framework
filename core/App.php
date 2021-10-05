<?php

namespace Core;

/**
 * Container for the App
 * Uses Dependency Injection
 */

class App
{
    // * Array of injected dependencies
    protected $registry = [];

    // * Bind a dependency to a key and save to the registry
    public function bind($key, $value)
    {
        // * check array key exists
        if (array_key_exists($key, $this->registry)) {
            throw new \Exception("Registry key already defined");
        }

        $this->registry[$key] = $value;
    }

    // * Get a bound dependency from the registry
    public function get($key)
    {
        if (array_key_exists($key, $this->registry)) {
            return $this->registry[$key];
        }

        throw new \Exception("Key not found in registry");
    }
}
