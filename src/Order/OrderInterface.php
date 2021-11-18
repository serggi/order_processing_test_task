<?php

declare(strict_types=1);

namespace Orders\Order;

interface OrderInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getItems(): array;

    public function getTotalAmount(): float;

    public function getDeliveryDetails(): string;

    public function isManual(): bool;
}
