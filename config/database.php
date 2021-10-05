<?php

/**
 * Database configuration
 */

return [
    "database" => [
        "connection" => $_ENV["DB_CONNECTION"],
        "host" => $_ENV["DB_HOST"],
        "port" => $_ENV["DB_POST"],
        "name" => $_ENV["DB_NAME"],
        "username" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
