<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CustomAttributeDefinitionEventDataObject extends JsonSerializableType
{
    /**
     * @var ?CustomAttributeDefinition $customAttributeDefinition The custom attribute definition.
     */
    #[JsonProperty('custom_attribute_definition')]
    private ?CustomAttributeDefinition $customAttributeDefinition;

    /**
     * @param array{
     *   customAttributeDefinition?: ?CustomAttributeDefinition,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeDefinition = $values['customAttributeDefinition'] ?? null;
    }

    /**
     * @return ?CustomAttributeDefinition
     */
    public function getCustomAttributeDefinition(): ?CustomAttributeDefinition
    {
        return $this->customAttributeDefinition;
    }

    /**
     * @param ?CustomAttributeDefinition $value
     */
    public function setCustomAttributeDefinition(?CustomAttributeDefinition $value = null): self
    {
        $this->customAttributeDefinition = $value;
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
