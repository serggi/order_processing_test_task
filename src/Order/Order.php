<?php

declare(strict_types=1);

namespace Orders\Order;

class Order implements OrderInterface
{
	private int $id;

	private bool $isManual;

	private string $name;

	private array $items;

	private float $totalAmount;

	private string $deliveryDetails;

    public function __construct(
        int $id,
        bool $isManual,
        string $name,
        array $items,
        float $totalAmount,
        string $deliveryDetails
    ) {
        foreach ($items as $item) {
            $this->items[] = (int) $item;
        }

        $this->id = $id;
        $this->isManual = $isManual;
        $this->name = $name;
        $this->totalAmount = $totalAmount;
        $this->deliveryDetails = $deliveryDetails;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalAmount(): float
    {
        return $this->totalAmount;
    }

    public function getDeliveryDetails(): string
    {
        return $this->deliveryDetails;
    }

    public function isManual(): bool
    {
        return $this->isManual;
    }
}
