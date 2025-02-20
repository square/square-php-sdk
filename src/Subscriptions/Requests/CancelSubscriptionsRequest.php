<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;

class CancelSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to cancel.
     */
    private string $subscriptionId;

    /**
     * @param array{
     *   subscriptionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
    }

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $value
     */
    public function setSubscriptionId(string $value): self
    {
        $this->subscriptionId = $value;
        return $this;
    }
}
