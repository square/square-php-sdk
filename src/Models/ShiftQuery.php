<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The parameters of a `Shift` search query, which includes filter and sort options.
 */
class ShiftQuery implements \JsonSerializable
{
    /**
     * @var ShiftFilter|null
     */
    private $filter;

    /**
     * @var ShiftSort|null
     */
    private $sort;

    /**
     * Returns Filter.
     *
     * Defines a filter used in a search for `Shift` records. `AND` logic is
     * used by Square's servers to apply each filter property specified.
     */
    public function getFilter(): ?ShiftFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Defines a filter used in a search for `Shift` records. `AND` logic is
     * used by Square's servers to apply each filter property specified.
     *
     * @maps filter
     */
    public function setFilter(?ShiftFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     *
     * Sets the sort order of search results.
     */
    public function getSort(): ?ShiftSort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * Sets the sort order of search results.
     *
     * @maps sort
     */
    public function setSort(?ShiftSort $sort): void
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
