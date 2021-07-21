<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains query criteria for the search.
 */
class SearchOrdersQuery implements \JsonSerializable
{
    /**
     * @var SearchOrdersFilter|null
     */
    private $filter;

    /**
     * @var SearchOrdersSort|null
     */
    private $sort;

    /**
     * Returns Filter.
     *
     * Filtering criteria to use for a `SearchOrders` request. Multiple filters
     * are ANDed together.
     */
    public function getFilter(): ?SearchOrdersFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Filtering criteria to use for a `SearchOrders` request. Multiple filters
     * are ANDed together.
     *
     * @maps filter
     */
    public function setFilter(?SearchOrdersFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     *
     * Sorting criteria for a `SearchOrders` request. Results can only be sorted
     * by a timestamp field.
     */
    public function getSort(): ?SearchOrdersSort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * Sorting criteria for a `SearchOrders` request. Results can only be sorted
     * by a timestamp field.
     *
     * @maps sort
     */
    public function setSort(?SearchOrdersSort $sort): void
    {
        $this->sort = $sort;
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
        if (isset($this->sort)) {
            $json['sort']   = $this->sort;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
