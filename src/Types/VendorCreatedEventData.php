<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Defines the `vendor.created` event data structure.
 */
class VendorCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the event data object. The value is `vendor`
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the event data object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?VendorCreatedEventObject $object An object containing the created vendor.
     */
    #[JsonProperty('object')]
    private ?VendorCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?VendorCreatedEventObject,
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
     * @return ?VendorCreatedEventObject
     */
    public function getObject(): ?VendorCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?VendorCreatedEventObject $value
     */
    public function setObject(?VendorCreatedEventObject $value = null): self
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
