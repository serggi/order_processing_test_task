<?php

namespace Orders\Logger;

class FileLogger implements LoggerInterface
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function log(string $message): void
    {
        file_put_contents($this->fileName, $message . PHP_EOL, FILE_APPEND);
    }
}
