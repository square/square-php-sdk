<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SearchAvailabilityQuery;
use Square\Core\Json\JsonProperty;

class SearchAvailabilityRequest extends JsonSerializableType
{
    /**
     * @var SearchAvailabilityQuery $query Query conditions used to filter buyer-accessible booking availabilities.
     */
    #[JsonProperty('query')]
    private SearchAvailabilityQuery $query;

    /**
     * @param array{
     *   query: SearchAvailabilityQuery,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->query = $values['query'];
    }

    /**
     * @return SearchAvailabilityQuery
     */
    public function getQuery(): SearchAvailabilityQuery
    {
        return $this->query;
    }

    /**
     * @param SearchAvailabilityQuery $value
     */
    public function setQuery(SearchAvailabilityQuery $value): self
    {
        $this->query = $value;
        return $this;
    }
}
