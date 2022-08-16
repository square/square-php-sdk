<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class PaymentLinkRelatedResources implements \JsonSerializable
{
    /**
     * @var Order[]|null
     */
    private $orders;

    /**
     * @var CatalogObject[]|null
     */
    private $subscriptionPlans;

    /**
     * Returns Orders.
     * The order associated with the payment link.
     *
     * @return Order[]|null
     */
    public function getOrders(): ?array
    {
        return $this->orders;
    }

    /**
     * Sets Orders.
     * The order associated with the payment link.
     *
     * @maps orders
     *
     * @param Order[]|null $orders
     */
    public function setOrders(?array $orders): void
    {
        $this->orders = $orders;
    }

    /**
     * Returns Subscription Plans.
     * The subscription plan associated with the payment link.
     *
     * @return CatalogObject[]|null
     */
    public function getSubscriptionPlans(): ?array
    {
        return $this->subscriptionPlans;
    }

    /**
     * Sets Subscription Plans.
     * The subscription plan associated with the payment link.
     *
     * @maps subscription_plans
     *
     * @param CatalogObject[]|null $subscriptionPlans
     */
    public function setSubscriptionPlans(?array $subscriptionPlans): void
    {
        $this->subscriptionPlans = $subscriptionPlans;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->orders)) {
            $json['orders']             = $this->orders;
        }
        if (isset($this->subscriptionPlans)) {
            $json['subscription_plans'] = $this->subscriptionPlans;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
