<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The parameters of a `Timecard` search query, which includes filter and sort options.
 */
class TimecardQuery extends JsonSerializableType
{
    /**
     * @var ?TimecardFilter $filter Query filter options.
     */
    #[JsonProperty('filter')]
    private ?TimecardFilter $filter;

    /**
     * @var ?TimecardSort $sort Sort order details.
     */
    #[JsonProperty('sort')]
    private ?TimecardSort $sort;

    /**
     * @param array{
     *   filter?: ?TimecardFilter,
     *   sort?: ?TimecardSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?TimecardFilter
     */
    public function getFilter(): ?TimecardFilter
    {
        return $this->filter;
    }

    /**
     * @param ?TimecardFilter $value
     */
    public function setFilter(?TimecardFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TimecardSort
     */
    public function getSort(): ?TimecardSort
    {
        return $this->sort;
    }

    /**
     * @param ?TimecardSort $value
     */
    public function setSort(?TimecardSort $value = null): self
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
