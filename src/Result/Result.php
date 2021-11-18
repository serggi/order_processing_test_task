<?php

namespace Orders\Result;

use Orders\Error\ErrorInterface;

class Result implements ResultInterface
{
    private ?ErrorInterface $error;

    public function __construct(?ErrorInterface $error)
    {
        $this->error = $error;
    }

    public function getError(): ?ErrorInterface
    {
        return $this->error;
    }
}
