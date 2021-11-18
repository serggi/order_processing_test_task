<?php

namespace Orders\Order\Factory;

use Orders\Order\OrderInterface;

interface OrderFactoryInterface
{
    public function create(
        int $orderId,
        bool $isManual,
        string $name,
        array $items,
        float $totalAmount,
        string $deliveryDetails
    ): OrderInterface;
}
