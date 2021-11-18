<?php

declare(strict_types=1);

namespace Orders;

interface OrderProcessorInterface
{
    /**
     * @param Order $order
     */
    public function process(Order $order): void;
}
