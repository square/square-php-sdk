<?php

declare(strict_types=1);

namespace Square\Models;

class CatalogQueryExact implements \JsonSerializable
{
    /**
     * @var string
     */
    private $attributeName;

    /**
     * @var string
     */
    private $attributeValue;

    /**
     * @param string $attributeName
     * @param string $attributeValue
     */
    public function __construct(string $attributeName, string $attributeValue)
    {
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
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
     * Returns Attribute Value.
     *
     * The desired value of the search attribute.
     */
    public function getAttributeValue(): string
    {
        return $this->attributeValue;
    }

    /**
     * Sets Attribute Value.
     *
     * The desired value of the search attribute.
     *
     * @required
     * @maps attribute_value
     */
    public function setAttributeValue(string $attributeValue): void
    {
        $this->attributeValue = $attributeValue;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['attribute_name'] = $this->attributeName;
        $json['attribute_value'] = $this->attributeValue;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
