<?php

namespace Orders\Order\Processor\Dictionary;

interface OrderProcessorDictionaryInterface
{
    public const MESSAGE_MANUAL_PROCESSING = 'Order "%s" NEEDS MANUAL PROCESSING';
    public const MESSAGE_AUTO_PROCESSING = 'Order "%s" WILL BE PROCESSED AUTOMATICALLY';
    public const MESSAGE_ORDER_IS_VALID = 'Order is valid';
    public const MESSAGE_ORDER_IS_INVALID = 'Order is invalid';
    public const MESSAGE_PROCESSING_START = 'Processing started, OrderId: %s';
}
