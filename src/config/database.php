<?php

/**
 * Database configuration
 */

return [
    "database" => [
        "connection" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "name" => "todos",
        "username" => "root",
        "password" => "",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
