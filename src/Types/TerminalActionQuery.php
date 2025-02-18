<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalActionQuery extends JsonSerializableType
{
    /**
     * @var ?TerminalActionQueryFilter $filter Options for filtering returned `TerminalAction`s
     */
    #[JsonProperty('filter')]
    private ?TerminalActionQueryFilter $filter;

    /**
     * @var ?TerminalActionQuerySort $sort Option for sorting returned `TerminalAction` objects.
     */
    #[JsonProperty('sort')]
    private ?TerminalActionQuerySort $sort;

    /**
     * @param array{
     *   filter?: ?TerminalActionQueryFilter,
     *   sort?: ?TerminalActionQuerySort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?TerminalActionQueryFilter
     */
    public function getFilter(): ?TerminalActionQueryFilter
    {
        return $this->filter;
    }

    /**
     * @param ?TerminalActionQueryFilter $value
     */
    public function setFilter(?TerminalActionQueryFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TerminalActionQuerySort
     */
    public function getSort(): ?TerminalActionQuerySort
    {
        return $this->sort;
    }

    /**
     * @param ?TerminalActionQuerySort $value
     */
    public function setSort(?TerminalActionQuerySort $value = null): self
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
