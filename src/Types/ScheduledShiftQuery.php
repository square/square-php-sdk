<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents filter and sort criteria for the `query` field in a
 * [SearchScheduledShifts](api-endpoint:Labor-SearchScheduledShifts) request.
 */
class ScheduledShiftQuery extends JsonSerializableType
{
    /**
     * @var ?ScheduledShiftFilter $filter Filtering options for the query.
     */
    #[JsonProperty('filter')]
    private ?ScheduledShiftFilter $filter;

    /**
     * @var ?ScheduledShiftSort $sort Sorting options for the query.
     */
    #[JsonProperty('sort')]
    private ?ScheduledShiftSort $sort;

    /**
     * @param array{
     *   filter?: ?ScheduledShiftFilter,
     *   sort?: ?ScheduledShiftSort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?ScheduledShiftFilter
     */
    public function getFilter(): ?ScheduledShiftFilter
    {
        return $this->filter;
    }

    /**
     * @param ?ScheduledShiftFilter $value
     */
    public function setFilter(?ScheduledShiftFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?ScheduledShiftSort
     */
    public function getSort(): ?ScheduledShiftSort
    {
        return $this->sort;
    }

    /**
     * @param ?ScheduledShiftSort $value
     */
    public function setSort(?ScheduledShiftSort $value = null): self
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
