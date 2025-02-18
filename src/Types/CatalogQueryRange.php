<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The query filter to return the search result whose named attribute values fall between the specified range.
 */
class CatalogQueryRange extends JsonSerializableType
{
    /**
     * @var string $attributeName The name of the attribute to be searched.
     */
    #[JsonProperty('attribute_name')]
    private string $attributeName;

    /**
     * @var ?int $attributeMinValue The desired minimum value for the search attribute (inclusive).
     */
    #[JsonProperty('attribute_min_value')]
    private ?int $attributeMinValue;

    /**
     * @var ?int $attributeMaxValue The desired maximum value for the search attribute (inclusive).
     */
    #[JsonProperty('attribute_max_value')]
    private ?int $attributeMaxValue;

    /**
     * @param array{
     *   attributeName: string,
     *   attributeMinValue?: ?int,
     *   attributeMaxValue?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributeName = $values['attributeName'];
        $this->attributeMinValue = $values['attributeMinValue'] ?? null;
        $this->attributeMaxValue = $values['attributeMaxValue'] ?? null;
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
     * @return ?int
     */
    public function getAttributeMinValue(): ?int
    {
        return $this->attributeMinValue;
    }

    /**
     * @param ?int $value
     */
    public function setAttributeMinValue(?int $value = null): self
    {
        $this->attributeMinValue = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getAttributeMaxValue(): ?int
    {
        return $this->attributeMaxValue;
    }

    /**
     * @param ?int $value
     */
    public function setAttributeMaxValue(?int $value = null): self
    {
        $this->attributeMaxValue = $value;
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
