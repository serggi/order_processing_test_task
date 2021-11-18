<?php

namespace Orders\Order\Processor\Result;

use Orders\Error\ErrorInterface;
use Orders\Order\OrderInterface;
use Orders\Result\Result;

class OrderProcessorResult extends Result implements OrderProcessorResultInterface
{
    private OrderInterface $order;

    public function __construct(OrderInterface $order, ?ErrorInterface $error = null)
    {
        $this->order = $order;

        parent::__construct($error);
    }

    public function getOrder(): OrderInterface
    {
        return $this->order;
    }
}
