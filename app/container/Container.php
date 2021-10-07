<?php

namespace App\Container;

use App\Container\Exception\DependencyHasNoDefaultValueException;
use App\Container\Exception\DependencyIsNotInstantiableException;
use ReflectionClass;

class Container implements ContainerInterface
{

    private array $instances = [];

    public function set($id, $abstract = null)
    {
        if (is_null($abstract)) {
            $abstract = $id;
        }

        $this->instances[$id] = $abstract;
    }

    public function get($id)
    {
        // * if doesn't exist, set it
        if (!$this->has($id)) {
            $this->set($id);
        }
        $abstract = $this->instances[$id];
        return $this->resolve($abstract);
    }

    public function has($id)
    {
        return isset($this->instances[$id]);
    }

    private function resolve($abstract)
    {
        $reflection = new ReflectionClass($abstract);

        // * Check if class is instantiable
        if (!$reflection->isInstantiable()) {
            throw new DependencyIsNotInstantiableException("Class {$abstract} is not instantiable");
        }

        // * Get constructor method of the class
        $constructor = $reflection->getConstructor();

        if (is_null($constructor)) {
            // * No dependencies to resolve, so just return an instance of the class
            return $reflection->newInstance();
        }

        // * Get dependencies
        $parameters = $constructor->getParameters();
        $dependencies = $this->getDependencies($parameters, $reflection);

        // * Return new instance with dependecies
        return $reflection->newInstanceArgs($dependencies);
    }

    // * Get dependencies required for class
    private function getDependencies($parameters, $reflection)
    {
        $dependencies = [];

        foreach ($parameters as $parameter) {
            // * For each parameter, get if the parameter is a class type
            $dependency = $parameter->getClass();

            // * if not, it's a simple variable
            if (is_null($dependency)) {
                // * Check parameter has a default value
                if ($parameter->isDefaultValueAvailable()) {
                    // * Store it in dependencies
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    // * throw if no default value, can't resolve if requires a value
                    throw new DependencyHasNoDefaultValueException("Cannot resolve class dependency {$parameter}");
                }
            } else {
                $dependencies[] = $this->get($dependency->name);
            }
        }

        return $dependencies;
    }
}
