<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about the change that triggered the event.
 */
class CustomerCreatedEventEventContext extends JsonSerializableType
{
    /**
     * @var ?CustomerCreatedEventEventContextMerge $merge Information about the merge operation associated with the event.
     */
    #[JsonProperty('merge')]
    private ?CustomerCreatedEventEventContextMerge $merge;

    /**
     * @param array{
     *   merge?: ?CustomerCreatedEventEventContextMerge,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merge = $values['merge'] ?? null;
    }

    /**
     * @return ?CustomerCreatedEventEventContextMerge
     */
    public function getMerge(): ?CustomerCreatedEventEventContextMerge
    {
        return $this->merge;
    }

    /**
     * @param ?CustomerCreatedEventEventContextMerge $value
     */
    public function setMerge(?CustomerCreatedEventEventContextMerge $value = null): self
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
