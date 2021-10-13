<?php

namespace Core\Model;

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
}
