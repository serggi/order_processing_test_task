<?php

namespace Orders\Order\Validator;

use Orders\Order\OrderInterface;

class OrderValidator implements OrderValidatorInterface
{
	private int $minimumAmount;

    public function __construct(int $minimumAmount)
    {
        $this->minimumAmount = $minimumAmount;
    }

    public function validate(OrderInterface $order): bool
    {
	    return strlen($order->getName()) > 2 && $order->getTotalAmount() > $this->minimumAmount;
    }
}
