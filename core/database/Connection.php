<?php

namespace Core\Database;

/**
 * Class to handle creating a database connetion
 */

class Connection
{
    public static function make($config)
    {
        // * Attempt to connect to the database
        try {
            return new \PDO(
                $config['connection'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
