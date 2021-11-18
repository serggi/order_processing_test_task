<?php

namespace Orders\Order\Processor\Result;

use Orders\Order\OrderInterface;
use Orders\Result\ResultInterface;

interface OrderProcessorResultInterface extends ResultInterface
{
    public function getOrder(): OrderInterface;
}
