<?php

namespace Core\Database;

use Core\Database\QueryBuilder;

class Migration
{

    /**
     * Query Builder
     */
    private QueryBuilder $query_builder;

    private string $root;

    public function __construct($root, $query_builder)
    {
        $this->root = $root;
        $this->query_builder = $query_builder;
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $applied_migrations = $this->getAppliedMigrations();

        $files = scandir($this->root . '/migrations');

        $toApplyMigrations = array_diff($files, $applied_migrations);

        $newMigrations = [];

        foreach ($toApplyMigrations as $migration) {
            if ($migration == '.' || $migration == "..") {
                continue;
            }

            require_once $this->root . '/migrations/' . $migration;
            $classname = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $classname;

            $this->log("Applying migration {$classname}");
            $instance->up($this->query_builder);
            $this->log("Applied migration {$classname}");

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            foreach ($newMigrations as $migration) {
                $this->query_builder->insert('migrations', array('migration' => $migration));
            }
        } else {
            $this->log("All migrations already applied");
        }
    }

    protected function createMigrationsTable()
    {
        $this->query_builder->createTable('migrations', [
            'id int auto_increment primary key',
            'migration varchar(255)',
            'created_at timestamp default current_timestamp'
        ]);
    }

    protected function getAppliedMigrations()
    {
        return $this->query_builder->selectAllFromColumn('migrations', 'migration');
    }

    protected function log($message)
    {
        echo '[' . date('Y-m-d H:i:s') . '] : ' . $message . PHP_EOL;
    }
}
