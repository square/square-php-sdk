<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalRefundQuerySort extends JsonSerializableType
{
    /**
     * The order in which results are listed.
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @var ?string $sortOrder
     */
    #[JsonProperty('sort_order')]
    private ?string $sortOrder;

    /**
     * @param array{
     *   sortOrder?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sortOrder = $values['sortOrder'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?string $value
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
