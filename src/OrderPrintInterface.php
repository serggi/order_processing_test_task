<?php

declare(strict_types=1);

namespace Orders;

interface OrderPrintInterface
{
    /**
     * @param Order $order
     */
    public function printToFile(Order $order): void;
}
