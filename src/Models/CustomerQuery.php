<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a query (including filtering criteria, sorting criteria, or both) used to search
 * for customer profiles.
 */
class CustomerQuery implements \JsonSerializable
{
    /**
     * @var CustomerFilter|null
     */
    private $filter;

    /**
     * @var CustomerSort|null
     */
    private $sort;

    /**
     * Returns Filter.
     *
     * Represents a set of `CustomerQuery` filters used to limit the set of
     * customers returned by the [SearchCustomers]($e/Customers/SearchCustomers) endpoint.
     */
    public function getFilter(): ?CustomerFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Represents a set of `CustomerQuery` filters used to limit the set of
     * customers returned by the [SearchCustomers]($e/Customers/SearchCustomers) endpoint.
     *
     * @maps filter
     */
    public function setFilter(?CustomerFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     *
     * Specifies how searched customers profiles are sorted, including the sort key and sort order.
     */
    public function getSort(): ?CustomerSort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * Specifies how searched customers profiles are sorted, including the sort key and sort order.
     *
     * @maps sort
     */
    public function setSort(?CustomerSort $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }
        if (isset($this->sort)) {
            $json['sort']   = $this->sort;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
