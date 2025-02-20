<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an [AccumulateLoyaltyPoints](api-endpoint:Loyalty-AccumulateLoyaltyPoints) response.
 */
class AccumulateLoyaltyPointsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyEvent $event The resulting loyalty event. Starting in Square version 2022-08-17, this field is no longer returned.
     */
    #[JsonProperty('event')]
    private ?LoyaltyEvent $event;

    /**
     * The resulting loyalty events. If the purchase qualifies for points, the `ACCUMULATE_POINTS` event
     * is always included. When using the Orders API, the `ACCUMULATE_PROMOTION_POINTS` event is included
     * if the purchase also qualifies for a loyalty promotion.
     *
     * @var ?array<LoyaltyEvent> $events
     */
    #[JsonProperty('events'), ArrayType([LoyaltyEvent::class])]
    private ?array $events;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   event?: ?LoyaltyEvent,
     *   events?: ?array<LoyaltyEvent>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->event = $values['event'] ?? null;
        $this->events = $values['events'] ?? null;
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
     * @return ?array<LoyaltyEvent>
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param ?array<LoyaltyEvent> $value
     */
    public function setEvents(?array $value = null): self
    {
        $this->events = $value;
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
