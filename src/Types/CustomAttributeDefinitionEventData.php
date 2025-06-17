<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an object in the CustomAttributeDefinition event notification
 * payload that contains the affected custom attribute definition.
 */
class CustomAttributeDefinitionEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the event data object. The value is `"custom_attribute_definition"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the event data object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?CustomAttributeDefinitionEventDataObject $object An object containing the custom attribute definition.
     */
    #[JsonProperty('object')]
    private ?CustomAttributeDefinitionEventDataObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?CustomAttributeDefinitionEventDataObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?CustomAttributeDefinitionEventDataObject
     */
    public function getObject(): ?CustomAttributeDefinitionEventDataObject
    {
        return $this->object;
    }

    /**
     * @param ?CustomAttributeDefinitionEventDataObject $value
     */
    public function setObject(?CustomAttributeDefinitionEventDataObject $value = null): self
    {
        $this->object = $value;
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
