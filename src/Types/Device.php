<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class Device extends JsonSerializableType
{
    /**
     * A synthetic identifier for the device. The identifier includes a standardized prefix and
     * is otherwise an opaque id generated from key device fields.
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var DeviceAttributes $attributes A collection of DeviceAttributes representing the device.
     */
    #[JsonProperty('attributes')]
    private DeviceAttributes $attributes;

    /**
     * @var ?array<Component> $components A list of components applicable to the device.
     */
    #[JsonProperty('components'), ArrayType([Component::class])]
    private ?array $components;

    /**
     * @var ?DeviceStatus $status The current status of the device.
     */
    #[JsonProperty('status')]
    private ?DeviceStatus $status;

    /**
     * @param array{
     *   attributes: DeviceAttributes,
     *   id?: ?string,
     *   components?: ?array<Component>,
     *   status?: ?DeviceStatus,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->attributes = $values['attributes'];
        $this->components = $values['components'] ?? null;
        $this->status = $values['status'] ?? null;
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
     * @return DeviceAttributes
     */
    public function getAttributes(): DeviceAttributes
    {
        return $this->attributes;
    }

    /**
     * @param DeviceAttributes $value
     */
    public function setAttributes(DeviceAttributes $value): self
    {
        $this->attributes = $value;
        return $this;
    }

    /**
     * @return ?array<Component>
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }

    /**
     * @param ?array<Component> $value
     */
    public function setComponents(?array $value = null): self
    {
        $this->components = $value;
        return $this;
    }

    /**
     * @return ?DeviceStatus
     */
    public function getStatus(): ?DeviceStatus
    {
        return $this->status;
    }

    /**
     * @param ?DeviceStatus $value
     */
    public function setStatus(?DeviceStatus $value = null): self
    {
        $this->status = $value;
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
