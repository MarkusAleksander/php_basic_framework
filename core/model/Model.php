<?php

namespace Core\Model;

use Core\App\App;

abstract class Model
{

    /**
     * Table that is associated with this model
     */
    protected string $table;

    /**
     * Assoc Array storage of model data
     */
    protected array $model_data = [];

    /**
     * Array of properties that the model can store
     */
    protected array $props = [];

    /**
     * Store data in model
     */
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (in_array($key, $this->props)) {
                $this->model_data[$key] = $value;
            }
        }
    }

    /**
     * Retrieve saved model data
     */
    public function getData()
    {
        return $this->model_data;
    }

    /**
     * Get prop
     */
    public function getDataProp($key)
    {
        return $this->model_data[$key];
    }

    /**
     * Update data prop
     */
    public function updateDataProp($key, $newValue)
    {
        if (in_array($key, $this->props)) {
            return $this->model_data[$key] = $newValue;
        }
    }

    /**
     * Save to database
     */
    public function save()
    {
        App::$app->query()->insert($this->table, $this->getData());
    }
}
