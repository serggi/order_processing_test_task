<?php

namespace Orders\Order\Factory;

use Orders\Order\Order;
use Orders\Order\OrderInterface;

class OrderFactory implements OrderFactoryInterface
{
    public function create(
        int $orderId,
        bool $isManual,
        string $name,
        array $items,
        float $totalAmount,
        string $deliveryDetails = ''
    ): OrderInterface {
        return new Order(
            $orderId,
            $isManual,
            $name,
            $items,
            $totalAmount,
            $deliveryDetails
        );
    }
}
