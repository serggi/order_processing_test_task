<?php

namespace Orders\Order\Processor;

use Orders\Order\OrderInterface;
use Orders\Order\Processor\Result\OrderProcessorResultInterface;

interface OrderProcessorInterface
{
    public function process(OrderInterface $order): OrderProcessorResultInterface;
}
