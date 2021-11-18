<?php

namespace Orders\Error\Factory;

use Orders\Error\Error;
use Orders\Error\ErrorInterface;

class ErrorFactory implements ErrorFactoryInterface
{
    public function createError(string $message): ErrorInterface
    {
        return new Error($message);
    }
}
