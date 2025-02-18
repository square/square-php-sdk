<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that includes the `LoyaltyEvent` published for redeeming the reward.
 */
class RedeemLoyaltyRewardResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyEvent $event The `LoyaltyEvent` for redeeming the reward.
     */
    #[JsonProperty('event')]
    private ?LoyaltyEvent $event;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   event?: ?LoyaltyEvent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->event = $values['event'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEvent
     */
    public function getEvent(): ?LoyaltyEvent
    {
        return $this->event;
    }

    /**
     * @param ?LoyaltyEvent $value
     */
    public function setEvent(?LoyaltyEvent $value = null): self
    {
        $this->event = $value;
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
