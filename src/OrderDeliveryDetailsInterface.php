<?php

declare(strict_types=1);

namespace Orders;

interface OrderDeliveryDetailsInterface
{
    public const MESSAGE_DELIVERY_TIME_BASIC  = 'Order delivery time: %s';
    public const MESSAGE_DELIVERY_TIME_1_DAY  = '1 day';
    public const MESSAGE_DELIVERY_TIME_2_DAYS = '2 days';

    /**
     * @param int $productsCount
     *
     * @return string
     */
    public static function getDeliveryDetails(int $productsCount): string;
}
