<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the search result(s) by exact match of the specified `attribute_name` and any of
 * the `attribute_values`.
 */
class CatalogQuerySet extends JsonSerializableType
{
    /**
     * @var string $attributeName The name of the attribute to be searched. Matching of the attribute name is exact.
     */
    #[JsonProperty('attribute_name')]
    private string $attributeName;

    /**
     * The desired values of the search attribute. Matching of the attribute values is exact and case insensitive.
     * A maximum of 250 values may be searched in a request.
     *
     * @var array<string> $attributeValues
     */
    #[JsonProperty('attribute_values'), ArrayType(['string'])]
    private array $attributeValues;

    /**
     * @param array{
     *   attributeName: string,
     *   attributeValues: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributeName = $values['attributeName'];
        $this->attributeValues = $values['attributeValues'];
    }

    /**
     * @return string
     */
    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    /**
     * @param string $value
     */
    public function setAttributeName(string $value): self
    {
        $this->attributeName = $value;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getAttributeValues(): array
    {
        return $this->attributeValues;
    }

    /**
     * @param array<string> $value
     */
    public function setAttributeValues(array $value): self
    {
        $this->attributeValues = $value;
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
