<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents filtering and sorting criteria for a [SearchCustomers](api-endpoint:Customers-SearchCustomers) request.
 */
class CustomerQuery extends JsonSerializableType
{
    /**
     * The filtering criteria for the search query. A query can contain multiple filters in any combination.
     * Multiple filters are combined as `AND` statements.
     *
     * __Note:__ Combining multiple filters as `OR` statements is not supported. Instead, send multiple single-filter
     * searches and join the result sets.
     *
     * @var ?CustomerFilter $filter
     */
    #[JsonProperty('filter')]
    private ?CustomerFilter $filter;

    /**
     * Sorting criteria for query results. The default behavior is to sort
     * customers alphabetically by `given_name` and `family_name`.
     *
     * @var ?CustomerSort $sort
     */
    #[JsonProperty('sort')]
    private ?CustomerSort $sort;

    /**
     * @param array{
     *   filter?: ?CustomerFilter,
     *   sort?: ?CustomerSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?CustomerFilter
     */
    public function getFilter(): ?CustomerFilter
    {
        return $this->filter;
    }

    /**
     * @param ?CustomerFilter $value
     */
    public function setFilter(?CustomerFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?CustomerSort
     */
    public function getSort(): ?CustomerSort
    {
        return $this->sort;
    }

    /**
     * @param ?CustomerSort $value
     */
    public function setSort(?CustomerSort $value = null): self
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
