<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutQuery extends JsonSerializableType
{
    /**
     * @var ?TerminalCheckoutQueryFilter $filter Options for filtering returned `TerminalCheckout` objects.
     */
    #[JsonProperty('filter')]
    private ?TerminalCheckoutQueryFilter $filter;

    /**
     * @var ?TerminalCheckoutQuerySort $sort Option for sorting returned `TerminalCheckout` objects.
     */
    #[JsonProperty('sort')]
    private ?TerminalCheckoutQuerySort $sort;

    /**
     * @param array{
     *   filter?: ?TerminalCheckoutQueryFilter,
     *   sort?: ?TerminalCheckoutQuerySort,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return ?TerminalCheckoutQueryFilter
     */
    public function getFilter(): ?TerminalCheckoutQueryFilter
    {
        return $this->filter;
    }

    /**
     * @param ?TerminalCheckoutQueryFilter $value
     */
    public function setFilter(?TerminalCheckoutQueryFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TerminalCheckoutQuerySort
     */
    public function getSort(): ?TerminalCheckoutQuerySort
    {
        return $this->sort;
    }

    /**
     * @param ?TerminalCheckoutQuerySort $value
     */
    public function setSort(?TerminalCheckoutQuerySort $value = null): self
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
