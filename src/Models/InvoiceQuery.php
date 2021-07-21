<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes query criteria for searching invoices.
 */
class InvoiceQuery implements \JsonSerializable
{
    /**
     * @var InvoiceFilter
     */
    private $filter;

    /**
     * @var InvoiceSort|null
     */
    private $sort;

    /**
     * @param InvoiceFilter $filter
     */
    public function __construct(InvoiceFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Returns Filter.
     *
     * Describes query filters to apply.
     */
    public function getFilter(): InvoiceFilter
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Describes query filters to apply.
     *
     * @required
     * @maps filter
     */
    public function setFilter(InvoiceFilter $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     *
     * Identifies the sort field and sort order.
     */
    public function getSort(): ?InvoiceSort
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * Identifies the sort field and sort order.
     *
     * @maps sort
     */
    public function setSort(?InvoiceSort $sort): void
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
        $json['filter']   = $this->filter;
        if (isset($this->sort)) {
            $json['sort'] = $this->sort;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
