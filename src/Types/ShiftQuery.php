<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The parameters of a `Shift` search query, which includes filter and sort options.
 *
 * Deprecated at Square API version 2025-05-21. See the [migration notes](https://developer.squareup.com/docs/labor-api/what-it-does#migration-notes).
 */
class ShiftQuery extends JsonSerializableType
{
    /**
     * @var ?ShiftFilter $filter Query filter options.
     */
    #[JsonProperty('filter')]
    private ?ShiftFilter $filter;

    /**
     * @var ?ShiftSort $sort Sort order details.
     */
    #[JsonProperty('sort')]
    private ?ShiftSort $sort;

    /**
     * @param array{
     *   filter?: ?ShiftFilter,
     *   sort?: ?ShiftSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?ShiftFilter
     */
    public function getFilter(): ?ShiftFilter
    {
        return $this->filter;
    }

    /**
     * @param ?ShiftFilter $value
     */
    public function setFilter(?ShiftFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?ShiftSort
     */
    public function getSort(): ?ShiftSort
    {
        return $this->sort;
    }

    /**
     * @param ?ShiftSort $value
     */
    public function setSort(?ShiftSort $value = null): self
    {
        $this->sort = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
