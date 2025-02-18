<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The query filter to return the search result by exact match of the specified attribute name and value.
 */
class CatalogQueryExact extends JsonSerializableType
{
    /**
     * @var string $attributeName The name of the attribute to be searched. Matching of the attribute name is exact.
     */
    #[JsonProperty('attribute_name')]
    private string $attributeName;

    /**
     * The desired value of the search attribute. Matching of the attribute value is case insensitive and can be partial.
     * For example, if a specified value of "sma", objects with the named attribute value of "Small", "small" are both matched.
     *
     * @var string $attributeValue
     */
    #[JsonProperty('attribute_value')]
    private string $attributeValue;

    /**
     * @param array{
     *   attributeName: string,
     *   attributeValue: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributeName = $values['attributeName'];
        $this->attributeValue = $values['attributeValue'];
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
     * @return string
     */
    public function getAttributeValue(): string
    {
        return $this->attributeValue;
    }

    /**
     * @param string $value
     */
    public function setAttributeValue(string $value): self
    {
        $this->attributeValue = $value;
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
