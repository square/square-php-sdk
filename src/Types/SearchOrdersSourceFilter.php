<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A filter based on order `source` information.
 */
class SearchOrdersSourceFilter extends JsonSerializableType
{
    /**
     * Filters by the [Source](entity:OrderSource) `name`. The filter returns any orders
     * with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @var ?array<string> $sourceNames
     */
    #[JsonProperty('source_names'), ArrayType(['string'])]
    private ?array $sourceNames;

    /**
     * @param array{
     *   sourceNames?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sourceNames = $values['sourceNames'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getSourceNames(): ?array
    {
        return $this->sourceNames;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceNames(?array $value = null): self
    {
        $this->sourceNames = $value;
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
