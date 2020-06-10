<?php

declare(strict_types=1);

namespace Square\Models;

class CatalogQueryCustomAttributeUsage implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $customAttributeDefinitionIds;

    /**
     * @var bool|null
     */
    private $hasValue;

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
     * Returns Has Value.
     */
    public function getHasValue(): ?bool
    {
        return $this->hasValue;
    }

    /**
     * Sets Has Value.
     *
     * @maps has_value
     */
    public function setHasValue(?bool $hasValue): void
    {
        $this->hasValue = $hasValue;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['custom_attribute_definition_ids'] = $this->customAttributeDefinitionIds;
        $json['has_value']                    = $this->hasValue;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
