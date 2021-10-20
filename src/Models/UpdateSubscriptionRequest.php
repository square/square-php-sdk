<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->subscription)) {
            $json['subscription'] = $this->subscription;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
