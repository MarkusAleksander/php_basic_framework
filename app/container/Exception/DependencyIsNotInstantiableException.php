<?php

namespace App\Container\Exception;

use Exception;
use App\Container\NotFoundExceptionInterface;

class DependencyIsNotInstantiableException extends Exception implements NotFoundExceptionInterface
{
}
