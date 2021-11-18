<?php

declare(strict_types=1);

namespace Orders;

interface OrderAddDeliveryCostInterface
{
    /**
     * @param Order $order
     */
    public function addDeliveryCostLargeItem(Order $order): void;
}
