<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The query filter to return the search result whose named attribute values fall between the
 * specified range.
 */
class CatalogQueryRange implements \JsonSerializable
{
    /**
     * @var string
     */
    private $attributeName;

    /**
     * @var int|null
     */
    private $attributeMinValue;

    /**
     * @var int|null
     */
    private $attributeMaxValue;

    /**
     * @param string $attributeName
     */
    public function __construct(string $attributeName)
    {
        $this->attributeName = $attributeName;
    }

    /**
     * Returns Attribute Name.
     *
     * The name of the attribute to be searched.
     */
    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    /**
     * Sets Attribute Name.
     *
     * The name of the attribute to be searched.
     *
     * @required
     * @maps attribute_name
     */
    public function setAttributeName(string $attributeName): void
    {
        $this->attributeName = $attributeName;
    }

    /**
     * Returns Attribute Min Value.
     *
     * The desired minimum value for the search attribute (inclusive).
     */
    public function getAttributeMinValue(): ?int
    {
        return $this->attributeMinValue;
    }

    /**
     * Sets Attribute Min Value.
     *
     * The desired minimum value for the search attribute (inclusive).
     *
     * @maps attribute_min_value
     */
    public function setAttributeMinValue(?int $attributeMinValue): void
    {
        $this->attributeMinValue = $attributeMinValue;
    }

    /**
     * Returns Attribute Max Value.
     *
     * The desired maximum value for the search attribute (inclusive).
     */
    public function getAttributeMaxValue(): ?int
    {
        return $this->attributeMaxValue;
    }

    /**
     * Sets Attribute Max Value.
     *
     * The desired maximum value for the search attribute (inclusive).
     *
     * @maps attribute_max_value
     */
    public function setAttributeMaxValue(?int $attributeMaxValue): void
    {
        $this->attributeMaxValue = $attributeMaxValue;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['attribute_name']          = $this->attributeName;
        if (isset($this->attributeMinValue)) {
            $json['attribute_min_value'] = $this->attributeMinValue;
        }
        if (isset($this->attributeMaxValue)) {
            $json['attribute_max_value'] = $this->attributeMaxValue;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
