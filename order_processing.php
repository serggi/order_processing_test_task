<?php

require_once 'vendor/autoload.php';

use Orders\Order\Factory\OrderFactory;
use Orders\Order\Processor\OrderProcessor;
use Orders\Error\Factory\ErrorFactory;
use Orders\Order\Processor\Result\Factory\OrderProcessorResultFactory;
use Orders\Order\Validator\OrderValidator;
use Orders\Logger\FileLogger;
use Orders\Order\Storage\OrderFileStorage;

$fileName = $argv[1];

$minimumAmount = (int) file_get_contents('input/minimumAmount');

$orderFactory = new OrderFactory();
$logger = new FileLogger('orderProcessLog');
$storage = new OrderFileStorage('result');

$orderProcessor = new OrderProcessor(
    new ErrorFactory(),
    $orderFactory,
    new OrderProcessorResultFactory,
    new OrderValidator($minimumAmount),
    $logger
);

$fileHandler = fopen($fileName, 'r+');

while ($fields = fgetcsv($fileHandler)) {
    $order = $orderFactory->create(
        (int) $fields[0],
        false,
        (string) $fields[1],
        array_map('intval', explode(',', $fields[2])),
        (float) $fields[3]
    );

    $result = $orderProcessor->process($order);

    if (null !== $error = $result->getError()) {
        $logger->log($error->getMessage());
        continue;
    }

    $storage->save($result->getOrder());
}

fclose($fileHandler);
