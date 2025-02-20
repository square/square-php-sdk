<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Subscription;
use Square\Core\Json\JsonProperty;

class UpdateSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId The ID of the subscription to update.
     */
    private string $subscriptionId;

    /**
     * The subscription object containing the current version, and fields to update.
     * Unset fields will be left at their current server values, and JSON `null` values will
     * be treated as a request to clear the relevant data.
     *
     * @var ?Subscription $subscription
     */
    #[JsonProperty('subscription')]
    private ?Subscription $subscription;

    /**
     * @param array{
     *   subscriptionId: string,
     *   subscription?: ?Subscription,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->subscription = $values['subscription'] ?? null;
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

    /**
     * @return ?Subscription
     */
    public function getSubscription(): ?Subscription
    {
        return $this->subscription;
    }

    /**
     * @param ?Subscription $value
     */
    public function setSubscription(?Subscription $value = null): self
    {
        $this->subscription = $value;
        return $this;
    }
}
