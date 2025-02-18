<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalRefundQuery extends JsonSerializableType
{
    /**
     * @var ?TerminalRefundQueryFilter $filter The filter for the Terminal refund query.
     */
    #[JsonProperty('filter')]
    private ?TerminalRefundQueryFilter $filter;

    /**
     * @var ?TerminalRefundQuerySort $sort The sort order for the Terminal refund query.
     */
    #[JsonProperty('sort')]
    private ?TerminalRefundQuerySort $sort;

    /**
     * @param array{
     *   filter?: ?TerminalRefundQueryFilter,
     *   sort?: ?TerminalRefundQuerySort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?TerminalRefundQueryFilter
     */
    public function getFilter(): ?TerminalRefundQueryFilter
    {
        return $this->filter;
    }

    /**
     * @param ?TerminalRefundQueryFilter $value
     */
    public function setFilter(?TerminalRefundQueryFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TerminalRefundQuerySort
     */
    public function getSort(): ?TerminalRefundQuerySort
    {
        return $this->sort;
    }

    /**
     * @param ?TerminalRefundQuerySort $value
     */
    public function setSort(?TerminalRefundQuerySort $value = null): self
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
