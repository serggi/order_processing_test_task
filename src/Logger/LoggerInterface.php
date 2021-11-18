<?php

namespace Orders\Logger;

interface LoggerInterface
{
    public function log(string $message): void;
}
