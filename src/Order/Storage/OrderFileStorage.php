<?php

namespace Orders\Order\Storage;

use Orders\Order\OrderInterface;

class OrderFileStorage implements OrderStorageInterface
{
    private string $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    public function save(OrderInterface $order): void
    {
        file_put_contents($this->fileName, $this->getLine($order), FILE_APPEND);
    }

    private function getLine(OrderInterface $order): string
    {
        $manual = 0;
        if ($order->isManual()) {
            $manual = 1;
        }

        return implode('-', [
            $order->getId(),
            implode(',', $order->getItems()),
            $order->getDeliveryDetails(),
            $manual,
            $order->getTotalAmount(),
            $order->getName(),
        ]) . PHP_EOL;
    }
}
