<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return mixed
     */
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
