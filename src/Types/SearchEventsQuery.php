<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains query criteria for the search.
 */
class SearchEventsQuery extends JsonSerializableType
{
    /**
     * @var ?SearchEventsFilter $filter Criteria to filter events by.
     */
    #[JsonProperty('filter')]
    private ?SearchEventsFilter $filter;

    /**
     * @var ?SearchEventsSort $sort Criteria to sort events by.
     */
    #[JsonProperty('sort')]
    private ?SearchEventsSort $sort;

    /**
     * @param array{
     *   filter?: ?SearchEventsFilter,
     *   sort?: ?SearchEventsSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?SearchEventsFilter
     */
    public function getFilter(): ?SearchEventsFilter
    {
        return $this->filter;
    }

    /**
     * @param ?SearchEventsFilter $value
     */
    public function setFilter(?SearchEventsFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?SearchEventsSort
     */
    public function getSort(): ?SearchEventsSort
    {
        return $this->sort;
    }

    /**
     * @param ?SearchEventsSort $value
     */
    public function setSort(?SearchEventsSort $value = null): self
    {
        $this->sort = $value;
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
