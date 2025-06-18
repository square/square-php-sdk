<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class SubscriptionUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Subscription $subscription The updated subscription.
     */
    #[JsonProperty('subscription')]
    private ?Subscription $subscription;

    /**
     * @param array{
     *   subscription?: ?Subscription,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscription = $values['subscription'] ?? null;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
