<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The query filter to return the search result whose named attribute values are prefixed by the specified attribute value.
 */
class CatalogQueryPrefix extends JsonSerializableType
{
    /**
     * @var string $attributeName The name of the attribute to be searched.
     */
    #[JsonProperty('attribute_name')]
    private string $attributeName;

    /**
     * @var string $attributePrefix The desired prefix of the search attribute value.
     */
    #[JsonProperty('attribute_prefix')]
    private string $attributePrefix;

    /**
     * @param array{
     *   attributeName: string,
     *   attributePrefix: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributeName = $values['attributeName'];
        $this->attributePrefix = $values['attributePrefix'];
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
    public function getAttributePrefix(): string
    {
        return $this->attributePrefix;
    }

    /**
     * @param string $value
     */
    public function setAttributePrefix(string $value): self
    {
        $this->attributePrefix = $value;
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
