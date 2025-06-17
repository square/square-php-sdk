<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about the change that triggered the event.
 */
class CustomerDeletedEventEventContext extends JsonSerializableType
{
    /**
     * @var ?CustomerDeletedEventEventContextMerge $merge Information about the merge operation associated with the event.
     */
    #[JsonProperty('merge')]
    private ?CustomerDeletedEventEventContextMerge $merge;

    /**
     * @param array{
     *   merge?: ?CustomerDeletedEventEventContextMerge,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merge = $values['merge'] ?? null;
    }

    /**
     * @return ?CustomerDeletedEventEventContextMerge
     */
    public function getMerge(): ?CustomerDeletedEventEventContextMerge
    {
        return $this->merge;
    }

    /**
     * @param ?CustomerDeletedEventEventContextMerge $value
     */
    public function setMerge(?CustomerDeletedEventEventContextMerge $value = null): self
    {
        $this->merge = $value;
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
