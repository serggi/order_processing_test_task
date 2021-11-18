<?php

namespace Orders\Order\Validator;

use Orders\Order\OrderInterface;

interface OrderValidatorInterface
{
    public function validate(OrderInterface $order): bool;
}
