<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Filter events by event type.
 */
class LoyaltyEventTypeFilter extends JsonSerializableType
{
    /**
     * The loyalty event types used to filter the result.
     * If multiple values are specified, the endpoint uses a
     * logical OR to combine them.
     * See [LoyaltyEventType](#type-loyaltyeventtype) for possible values
     *
     * @var array<value-of<LoyaltyEventType>> $types
     */
    #[JsonProperty('types'), ArrayType(['string'])]
    private array $types;

    /**
     * @param array{
     *   types: array<value-of<LoyaltyEventType>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->types = $values['types'];
    }

    /**
     * @return array<value-of<LoyaltyEventType>>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param array<value-of<LoyaltyEventType>> $value
     */
    public function setTypes(array $value): self
    {
        $this->types = $value;
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
