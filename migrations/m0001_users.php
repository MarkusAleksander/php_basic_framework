<?php

class m0001_users
{

    public function up($query_builder)
    {
        $query_builder->createTable('users', [
            'id INT AUTO_INCREMENT PRIMARY KEY',
            'email VARCHAR(255) NOT NULL',
            'password VARCHAR(512) NOT NULL',
            'first_name VARCHAR(255) NOT NULL',
            'last_name VARCHAR(255) NOT NULL',
            'status TINYINT DEFAULT 0',
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);
    }

    public function down()
    {
        echo "Down migration";
    }
}
