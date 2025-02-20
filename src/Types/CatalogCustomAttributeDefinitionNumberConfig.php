<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CatalogCustomAttributeDefinitionNumberConfig extends JsonSerializableType
{
    /**
     * An integer between 0 and 5 that represents the maximum number of
     * positions allowed after the decimal in number custom attribute values
     * For example:
     *
     * - if the precision is 0, the quantity can be 1, 2, 3, etc.
     * - if the precision is 1, the quantity can be 0.1, 0.2, etc.
     * - if the precision is 2, the quantity can be 0.01, 0.12, etc.
     *
     * Default: 5
     *
     * @var ?int $precision
     */
    #[JsonProperty('precision')]
    private ?int $precision;

    /**
     * @param array{
     *   precision?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->precision = $values['precision'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getPrecision(): ?int
    {
        return $this->precision;
    }

    /**
     * @param ?int $value
     */
    public function setPrecision(?int $value = null): self
    {
        $this->precision = $value;
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
