<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LoyaltyEventCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?LoyaltyEvent $loyaltyEvent The loyalty event that was created.
     */
    #[JsonProperty('loyalty_event')]
    private ?LoyaltyEvent $loyaltyEvent;

    /**
     * @param array{
     *   loyaltyEvent?: ?LoyaltyEvent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyEvent = $values['loyaltyEvent'] ?? null;
    }

    /**
     * @return ?LoyaltyEvent
     */
    public function getLoyaltyEvent(): ?LoyaltyEvent
    {
        return $this->loyaltyEvent;
    }

    /**
     * @param ?LoyaltyEvent $value
     */
    public function setLoyaltyEvent(?LoyaltyEvent $value = null): self
    {
        $this->loyaltyEvent = $value;
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
