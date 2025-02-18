<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a query, consisting of specified query expressions, used to search for subscriptions.
 */
class SearchSubscriptionsQuery extends JsonSerializableType
{
    /**
     * @var ?SearchSubscriptionsFilter $filter A list of query expressions.
     */
    #[JsonProperty('filter')]
    private ?SearchSubscriptionsFilter $filter;

    /**
     * @param array{
     *   filter?: ?SearchSubscriptionsFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
    }

    /**
     * @return ?SearchSubscriptionsFilter
     */
    public function getFilter(): ?SearchSubscriptionsFilter
    {
        return $this->filter;
    }

    /**
     * @param ?SearchSubscriptionsFilter $value
     */
    public function setFilter(?SearchSubscriptionsFilter $value = null): self
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
