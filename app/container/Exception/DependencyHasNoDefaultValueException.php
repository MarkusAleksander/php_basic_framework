<?php

namespace App\Container\Exception;

use Exception;
use App\Container\NotFoundExceptionInterface;

class DependencyHasNoDefaultValueException extends Exception implements NotFoundExceptionInterface
{
}
