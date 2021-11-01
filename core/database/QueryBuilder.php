<?php

namespace Core\Database;

/**
 * Class to provide an API for queries and manage executing of queries
 */

class QueryBuilder
{

    // * Reference active database connection
    protected $pdo;

    // * Ensure an active connection is passed on creating the QueryBuilder
    public function __construct($pdo)
    {
        // * TODO - check $pdo has been passed
        $this->pdo = $pdo;
    }

    // * Select All
    public function selectAll($table)
    {
        // * Prepare the statement
        $statement = $this->pdo->prepare("select * from {$table}");

        // * Execute
        $statement->execute();

        // * Return results
        return $statement->fetchAll(\PDO::FETCH_CLASS);
    }

    // * Select all from column
    public function selectAllFromColumn($table, $column)
    {
        // * Prepare the statement
        $statement = $this->pdo->prepare("select {$column} from {$table}");

        // * Execute
        $statement->execute();

        // * Return results
        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    // * Insert result
    public function insert($table, $params)
    {
        // * extract $param keys into a placeholder statement
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(',', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($params);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    // * Create table
    public function createTable($table, $params)
    {
        $sql = sprintf(
            'create table if not exists %s (%s)',
            $table,
            implode(',', array_values($params))
        );

        try {
            $this->pdo->exec($sql);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}
