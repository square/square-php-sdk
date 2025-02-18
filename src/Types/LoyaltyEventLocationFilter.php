<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Filter events by location.
 */
class LoyaltyEventLocationFilter extends JsonSerializableType
{
    /**
     * The [location](entity:Location) IDs for loyalty events to query.
     * If multiple values are specified, the endpoint uses
     * a logical OR to combine them.
     *
     * @var array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private array $locationIds;

    /**
     * @param array{
     *   locationIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationIds = $values['locationIds'];
    }

    /**
     * @return array<string>
     */
    public function getLocationIds(): array
    {
        return $this->locationIds;
    }

    /**
     * @param array<string> $value
     */
    public function setLocationIds(array $value): self
    {
        $this->locationIds = $value;
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
