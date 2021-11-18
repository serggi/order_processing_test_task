<?php

namespace Orders\Order\Storage;

use Orders\Order\OrderInterface;

interface OrderStorageInterface
{
    public function save(OrderInterface $order): void;
}
