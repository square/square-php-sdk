<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines parameters in a
 * [UpdateSubscription]($e/Subscriptions/UpdateSubscription) endpoint
 * request.
 */
class UpdateSubscriptionRequest implements \JsonSerializable
{
    /**
     * @var Subscription|null
     */
    private $subscription;

    /**
     * Returns Subscription.
     *
     * Represents a customer subscription to a subscription plan.
     * For an overview of the `Subscription` type, see
     * [Subscription object](https://developer.squareup.com/docs/subscriptions-api/overview#subscription-
     * object-overview).
     */
    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    /**
     * Sets Subscription.
     *
     * Represents a customer subscription to a subscription plan.
     * For an overview of the `Subscription` type, see
     * [Subscription object](https://developer.squareup.com/docs/subscriptions-api/overview#subscription-
     * object-overview).
     *
     * @maps subscription
     */
    public function setSubscription(?Subscription $subscription): void
    {
        $this->subscription = $subscription;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->subscription)) {
            $json['subscription'] = $this->subscription;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
