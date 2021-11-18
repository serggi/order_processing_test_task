<?php

namespace Orders\Error\Factory;

use Orders\Error\ErrorInterface;

interface ErrorFactoryInterface
{
    public function createError(string $message): ErrorInterface;
}
