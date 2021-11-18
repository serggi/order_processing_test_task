<?php

namespace Orders\Order\Processor;

use Orders\Error\Factory\ErrorFactoryInterface;
use Orders\Logger\LoggerInterface;
use Orders\Order\Factory\OrderFactoryInterface;
use Orders\Order\OrderInterface;
use Orders\Order\Processor\Dictionary\OrderProcessorDictionaryInterface;
use Orders\Order\Processor\Result\Factory\OrderProcessorResultFactoryInterface;
use Orders\Order\Processor\Result\OrderProcessorResultInterface;
use Orders\Order\Validator\OrderValidatorInterface;

class OrderProcessor implements OrderProcessorInterface
{
    private const ITEM_LIST_WITH_INCREASED_TOTAL_AMOUNT = [3231, 9823];

    private const ADDITIONAL_COST_TOTAL_AMOUNT = 100;

    public const MESSAGE_DELIVERY_TIME_BASIC  = 'Order delivery time: %s';

    public const MESSAGE_DELIVERY_TIME_1_DAY  = '1 day';

    public const MESSAGE_DELIVERY_TIME_2_DAYS = '2 days';

    private ErrorFactoryInterface $errorFactory;

    private OrderFactoryInterface $orderFactory;

    private OrderProcessorResultFactoryInterface $orderProcessorResultFactory;

	private OrderValidatorInterface $validator;

	private LoggerInterface $logger;

    public function __construct(
        ErrorFactoryInterface $errorFactory,
        OrderFactoryInterface $orderFactory,
        OrderProcessorResultFactoryInterface $orderProcessorResultFactory,
        OrderValidatorInterface $orderValidator,
        LoggerInterface $logger
    ) {
		$this->errorFactory = $errorFactory;
		$this->orderFactory = $orderFactory;
		$this->orderProcessorResultFactory = $orderProcessorResultFactory;
		$this->validator = $orderValidator;
		$this->logger = $logger;
    }

	public function process(OrderInterface $order): OrderProcessorResultInterface
	{
	    $this->logger->log(sprintf(
	        OrderProcessorDictionaryInterface::MESSAGE_PROCESSING_START,
            $order->getId()
        ));

		if (true === $this->validator->validate($order)) {
            $this->logger->log(sprintf(
                OrderProcessorDictionaryInterface::MESSAGE_ORDER_IS_VALID,
                $order->getId()
            ));

            $processingTypeLogMessage = sprintf(
                OrderProcessorDictionaryInterface::MESSAGE_AUTO_PROCESSING,
                $order->getId()
            );

            if ($order->isManual()) {
                $processingTypeLogMessage = sprintf(
                    OrderProcessorDictionaryInterface::MESSAGE_MANUAL_PROCESSING,
                    $order->getId()
                );
            }

            $this->logger->log($processingTypeLogMessage);

            $totalAmount = $this->getDeliveryCostLargeItem($order);
            $deliveryDetails = $this->getDeliveryDetails($order);

            return $this->orderProcessorResultFactory->createSuccess(
                $this->orderFactory->create(
                    $order->getId(),
                    $order->isManual(),
                    $order->getName(),
                    $order->getItems(),
                    $totalAmount,
                    $deliveryDetails
                )
            );
        }

		return $this->orderProcessorResultFactory->createError(
		    $order,
		    $this->errorFactory->createError(OrderProcessorDictionaryInterface::MESSAGE_ORDER_IS_INVALID)
        );
	}

    private function getDeliveryCostLargeItem(OrderInterface $order): float
    {
        $result = $order->getTotalAmount();
        foreach ($order->getItems() as $item) {
            if (in_array($item, self::ITEM_LIST_WITH_INCREASED_TOTAL_AMOUNT)) {
                $result += self::ADDITIONAL_COST_TOTAL_AMOUNT;
            }
        }

        return $result;
    }

    private static function getDeliveryDetails(OrderInterface $order): string
    {
        if (count($order->getItems()) > 1) {
            return sprintf(self::MESSAGE_DELIVERY_TIME_BASIC, self::MESSAGE_DELIVERY_TIME_2_DAYS);
        }

        return sprintf(self::MESSAGE_DELIVERY_TIME_BASIC, self::MESSAGE_DELIVERY_TIME_1_DAY);
    }
}
