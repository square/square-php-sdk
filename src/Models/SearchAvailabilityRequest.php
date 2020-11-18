<?php

declare(strict_types=1);

namespace Square\Models;

class SearchAvailabilityRequest implements \JsonSerializable
{
    /**
     * @var SearchAvailabilityQuery
     */
    private $query;

    /**
     * @param SearchAvailabilityQuery $query
     */
    public function __construct(SearchAvailabilityQuery $query)
    {
        $this->query = $query;
    }

    /**
     * Returns Query.
     *
     * Query conditions to search for availabilities of bookings.
     */
    public function getQuery(): SearchAvailabilityQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Query conditions to search for availabilities of bookings.
     *
     * @required
     * @maps query
     */
    public function setQuery(SearchAvailabilityQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['query'] = $this->query;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
