<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class PaymentLinkRelatedResources extends JsonSerializableType
{
    /**
     * @var ?array<Order> $orders The order associated with the payment link.
     */
    #[JsonProperty('orders'), ArrayType([Order::class])]
    private ?array $orders;

    /**
     * @var ?array<CatalogObject> $subscriptionPlans The subscription plan associated with the payment link.
     */
    #[JsonProperty('subscription_plans'), ArrayType([CatalogObject::class])]
    private ?array $subscriptionPlans;

    /**
     * @param array{
     *   orders?: ?array<Order>,
     *   subscriptionPlans?: ?array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orders = $values['orders'] ?? null;
        $this->subscriptionPlans = $values['subscriptionPlans'] ?? null;
    }

    /**
     * @return ?array<Order>
     */
    public function getOrders(): ?array
    {
        return $this->orders;
    }

    /**
     * @param ?array<Order> $value
     */
    public function setOrders(?array $value = null): self
    {
        $this->orders = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getSubscriptionPlans(): ?array
    {
        return $this->subscriptionPlans;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setSubscriptionPlans(?array $value = null): self
    {
        $this->subscriptionPlans = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
