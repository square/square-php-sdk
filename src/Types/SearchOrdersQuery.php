<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Contains query criteria for the search.
 */
class SearchOrdersQuery extends JsonSerializableType
{
    /**
     * @var ?SearchOrdersFilter $filter Criteria to filter results by.
     */
    #[JsonProperty('filter')]
    private ?SearchOrdersFilter $filter;

    /**
     * @var ?SearchOrdersSort $sort Criteria to sort results by.
     */
    #[JsonProperty('sort')]
    private ?SearchOrdersSort $sort;

    /**
     * @param array{
     *   filter?: ?SearchOrdersFilter,
     *   sort?: ?SearchOrdersSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?SearchOrdersFilter
     */
    public function getFilter(): ?SearchOrdersFilter
    {
        return $this->filter;
    }

    /**
     * @param ?SearchOrdersFilter $value
     */
    public function setFilter(?SearchOrdersFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?SearchOrdersSort
     */
    public function getSort(): ?SearchOrdersSort
    {
        return $this->sort;
    }

    /**
     * @param ?SearchOrdersSort $value
     */
    public function setSort(?SearchOrdersSort $value = null): self
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
