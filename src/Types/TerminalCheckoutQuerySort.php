<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutQuerySort extends JsonSerializableType
{
    /**
     * The order in which results are listed.
     * Default: `DESC`
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    #[JsonProperty('sort_order')]
    private ?string $sortOrder;

    /**
     * @param array{
     *   sortOrder?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sortOrder = $values['sortOrder'] ?? null;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
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
