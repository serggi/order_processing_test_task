<?php

namespace Orders;

interface OrderValidatorInterface
{
    /**
     * @param $order Order
     */
    public function validate(Order $order): void;
}
