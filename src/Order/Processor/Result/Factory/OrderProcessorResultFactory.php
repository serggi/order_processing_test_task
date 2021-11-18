<?php

namespace Orders\Order\Processor\Result\Factory;

use Orders\Error\ErrorInterface;
use Orders\Order\OrderInterface;
use Orders\Order\Processor\Result\OrderProcessorResult;
use Orders\Order\Processor\Result\OrderProcessorResultInterface;

class OrderProcessorResultFactory implements OrderProcessorResultFactoryInterface
{
    public function createSuccess(OrderInterface $order): OrderProcessorResultInterface
    {
        return new OrderProcessorResult($order);
    }

    public function createError(OrderInterface $order, ErrorInterface $error): OrderProcessorResultInterface
    {
        return new OrderProcessorResult($order,$error);
    }
}
