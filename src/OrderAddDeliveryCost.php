<?php

declare(strict_types=1);

namespace Orders;

class OrderAddDeliveryCost implements OrderAddDeliveryCostInterface
{
    private const ITEM_LIST_WITH_INCREASED_TOTAL_AMOUNT = [3231, 9823];
    private const ADDITIONAL_COST_TOTAL_AMOUNT          = 100;

    /**
     * @param Order $order
     */
    public function addDeliveryCostLargeItem(Order $order): void
    {
        foreach ($order->items as $item) {
            if (in_array($item, self::ITEM_LIST_WITH_INCREASED_TOTAL_AMOUNT)) {
                $order->totalAmount = $order->totalAmount + self::ADDITIONAL_COST_TOTAL_AMOUNT;
            }
        }
    }
}
