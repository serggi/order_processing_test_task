<?php

namespace Orders\Order\Processor\Result\Factory;

use Orders\Error\ErrorInterface;
use Orders\Order\OrderInterface;
use Orders\Order\Processor\Result\OrderProcessorResultInterface;

interface OrderProcessorResultFactoryInterface
{
    public function createSuccess(OrderInterface $order): OrderProcessorResultInterface;

    public function createError(OrderInterface $order, ErrorInterface $error): OrderProcessorResultInterface;
}
