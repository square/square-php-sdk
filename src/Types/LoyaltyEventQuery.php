<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a query used to search for loyalty events.
 */
class LoyaltyEventQuery extends JsonSerializableType
{
    /**
     * @var ?LoyaltyEventFilter $filter The query filter criteria.
     */
    #[JsonProperty('filter')]
    private ?LoyaltyEventFilter $filter;

    /**
     * @param array{
     *   filter?: ?LoyaltyEventFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
    }

    /**
     * @return ?LoyaltyEventFilter
     */
    public function getFilter(): ?LoyaltyEventFilter
    {
        return $this->filter;
    }

    /**
     * @param ?LoyaltyEventFilter $value
     */
    public function setFilter(?LoyaltyEventFilter $value = null): self
    {
        $this->filter = $value;
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
