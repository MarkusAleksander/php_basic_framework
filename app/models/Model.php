<?php

namespace App\Models;

/**
 * Base class for a Model
 */
class Model
{
    protected $queryBuilder;
    protected $table;

    public function __construct(\Core\Database\QueryBuilder $queryBuilder, $table = "")
    {
        $this->queryBuilder = $queryBuilder;
        $this->table = $table;
    }

    public function selectAll()
    {
        return $this->queryBuilder->selectAll($this->table);
    }

    public function insert($params)
    {
        $this->queryBuilder->insert($this->table, $params);
    }
}
