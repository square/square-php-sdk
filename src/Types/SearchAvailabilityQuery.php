<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The query used to search for buyer-accessible availabilities of bookings.
 */
class SearchAvailabilityQuery extends JsonSerializableType
{
    /**
     * @var SearchAvailabilityFilter $filter The query filter to search for buyer-accessible availabilities of existing bookings.
     */
    #[JsonProperty('filter')]
    private SearchAvailabilityFilter $filter;

    /**
     * @param array{
     *   filter: SearchAvailabilityFilter,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filter = $values['filter'];
    }

    /**
     * @return SearchAvailabilityFilter
     */
    public function getFilter(): SearchAvailabilityFilter
    {
        return $this->filter;
    }

    /**
     * @param SearchAvailabilityFilter $value
     */
    public function setFilter(SearchAvailabilityFilter $value): self
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
