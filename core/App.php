<?php

namespace Core;

/**
 * Container for the App
 * Uses Dependency Injection
 */

class App
{
    // * Array of injected dependencies
    protected static $registry = [];

    // * Bind a dependency to a key and save to the registry
    public static function bind($key, $value)
    {
        // * check array key exists
        if (array_key_exists($key, static::$registry)) {
            throw new \Exception("Registry key already defined");
        }

        static::$registry[$key] = $value;
    }

    // * Get a bound dependency from the registry
    public static function get($key)
    {
        if (array_key_exists($key, static::$registry)) {
            return static::$registry[$key];
        }

        throw new \Exception("Key not found in registry");
    }
}
