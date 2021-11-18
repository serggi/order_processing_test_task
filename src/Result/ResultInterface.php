<?php

namespace Orders\Result;

use Orders\Error\ErrorInterface;

interface ResultInterface
{
    public function getError(): ?ErrorInterface;
}
