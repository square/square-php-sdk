<?php

declare(strict_types=1);

namespace Square\Models;

class CatalogQueryFilteredItemsCustomAttributeFilter implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $filterType;

    /**
     * @var string[]|null
     */
    private $customAttributeDefinitionIds;

    /**
     * @var string|null
     */
    private $customAttributeValueExact;

    /**
     * @var string|null
     */
    private $customAttributeValuePrefix;

    /**
     * @var string|null
     */
    private $customAttributeMinValue;

    /**
     * @var string|null
     */
    private $customAttributeMaxValue;

    /**
     * Returns Filter Type.
     */
    public function getFilterType(): ?string
    {
        return $this->filterType;
    }

    /**
     * Sets Filter Type.
     *
     * @maps filter_type
     */
    public function setFilterType(?string $filterType): void
    {
        $this->filterType = $filterType;
    }

    /**
     * Returns Custom Attribute Definition Ids.
     *
     * @return string[]|null
     */
    public function getCustomAttributeDefinitionIds(): ?array
    {
        return $this->customAttributeDefinitionIds;
    }

    /**
     * Sets Custom Attribute Definition Ids.
     *
     * @maps custom_attribute_definition_ids
     *
     * @param string[]|null $customAttributeDefinitionIds
     */
    public function setCustomAttributeDefinitionIds(?array $customAttributeDefinitionIds): void
    {
        $this->customAttributeDefinitionIds = $customAttributeDefinitionIds;
    }

    /**
     * Returns Custom Attribute Value Exact.
     */
    public function getCustomAttributeValueExact(): ?string
    {
        return $this->customAttributeValueExact;
    }

    /**
     * Sets Custom Attribute Value Exact.
     *
     * @maps custom_attribute_value_exact
     */
    public function setCustomAttributeValueExact(?string $customAttributeValueExact): void
    {
        $this->customAttributeValueExact = $customAttributeValueExact;
    }

    /**
     * Returns Custom Attribute Value Prefix.
     */
    public function getCustomAttributeValuePrefix(): ?string
    {
        return $this->customAttributeValuePrefix;
    }

    /**
     * Sets Custom Attribute Value Prefix.
     *
     * @maps custom_attribute_value_prefix
     */
    public function setCustomAttributeValuePrefix(?string $customAttributeValuePrefix): void
    {
        $this->customAttributeValuePrefix = $customAttributeValuePrefix;
    }

    /**
     * Returns Custom Attribute Min Value.
     */
    public function getCustomAttributeMinValue(): ?string
    {
        return $this->customAttributeMinValue;
    }

    /**
     * Sets Custom Attribute Min Value.
     *
     * @maps custom_attribute_min_value
     */
    public function setCustomAttributeMinValue(?string $customAttributeMinValue): void
    {
        $this->customAttributeMinValue = $customAttributeMinValue;
    }

    /**
     * Returns Custom Attribute Max Value.
     */
    public function getCustomAttributeMaxValue(): ?string
    {
        return $this->customAttributeMaxValue;
    }

    /**
     * Sets Custom Attribute Max Value.
     *
     * @maps custom_attribute_max_value
     */
    public function setCustomAttributeMaxValue(?string $customAttributeMaxValue): void
    {
        $this->customAttributeMaxValue = $customAttributeMaxValue;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['filter_type']                  = $this->filterType;
        $json['custom_attribute_definition_ids'] = $this->customAttributeDefinitionIds;
        $json['custom_attribute_value_exact'] = $this->customAttributeValueExact;
        $json['custom_attribute_value_prefix'] = $this->customAttributeValuePrefix;
        $json['custom_attribute_min_value']   = $this->customAttributeMinValue;
        $json['custom_attribute_max_value']   = $this->customAttributeMaxValue;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
