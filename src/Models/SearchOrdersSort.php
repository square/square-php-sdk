<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Sorting criteria for a `SearchOrders` request. Results can only be sorted
 * by a timestamp field.
 */
class SearchOrdersSort implements \JsonSerializable
{
    /**
     * @var string
     */
    private $sortField;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * @param string $sortField
     */
    public function __construct(string $sortField)
    {
        $this->sortField = $sortField;
    }

    /**
     * Returns Sort Field.
     *
     * Specifies which timestamp to use to sort `SearchOrder` results.
     */
    public function getSortField(): string
    {
        return $this->sortField;
    }

    /**
     * Sets Sort Field.
     *
     * Specifies which timestamp to use to sort `SearchOrder` results.
     *
     * @required
     * @maps sort_field
     */
    public function setSortField(string $sortField): void
    {
        $this->sortField = $sortField;
    }

    /**
     * Returns Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps sort_order
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['sort_field']     = $this->sortField;
        if (isset($this->sortOrder)) {
            $json['sort_order'] = $this->sortOrder;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
