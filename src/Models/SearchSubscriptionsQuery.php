<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a query (including filtering criteria) used to search for subscriptions.
 */
class SearchSubscriptionsQuery implements \JsonSerializable
{
    /**
     * @var SearchSubscriptionsFilter|null
     */
    private $filter;

    /**
     * Returns Filter.
     *
     * Represents a set of SearchSubscriptionsQuery filters used to limit the set of Subscriptions returned
     * by SearchSubscriptions.
     */
    public function getFilter(): ?SearchSubscriptionsFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Represents a set of SearchSubscriptionsQuery filters used to limit the set of Subscriptions returned
     * by SearchSubscriptions.
     *
     * @maps filter
     */
    public function setFilter(?SearchSubscriptionsFilter $filter): void
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
