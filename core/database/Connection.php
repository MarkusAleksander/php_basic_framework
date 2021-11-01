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
            $pdo = new \PDO(
                $config['connection'] . ':host=' . $config['host'] . ';port=' . $config['port'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
