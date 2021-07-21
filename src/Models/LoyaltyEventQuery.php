<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a query used to search for loyalty events.
 */
class LoyaltyEventQuery implements \JsonSerializable
{
    /**
     * @var LoyaltyEventFilter|null
     */
    private $filter;

    /**
     * Returns Filter.
     *
     * The filtering criteria. If the request specifies multiple filters,
     * the endpoint uses a logical AND to evaluate them.
     */
    public function getFilter(): ?LoyaltyEventFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * The filtering criteria. If the request specifies multiple filters,
     * the endpoint uses a logical AND to evaluate them.
     *
     * @maps filter
     */
    public function setFilter(?LoyaltyEventFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
