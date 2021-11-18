<?php

declare(strict_types=1);

namespace Orders;

class OrderPrint implements OrderPrintInterface
{
    public function printToFile(Order $order): void
    {
        $result = ob_get_contents();
        ob_end_clean();

        if ($order->isValid()) {
            $lines = explode(PHP_EOL, $result);
            $lineWithoutDebugInfo = [];
            foreach ($lines as $line) {
                if (strpos($line, 'Reason:') === false) {
                    $lineWithoutDebugInfo[] = $line;
                }
            }
        }

        file_put_contents('orderProcessLog', @file_get_contents('orderProcessLog') . implode(PHP_EOL, $lineWithoutDebugInfo ?? [$result] ));
        if ($order->isValid()) {
            file_put_contents('result', @file_get_contents('result') . $order->orderId . '-' . implode(',', $order->items) . '-' . $order->deliveryDetails . '-' . ($order->isManual ? 1 : 0) . '-' . $order->totalAmount . '-' . $order->name . PHP_EOL);
        }
    }
}
