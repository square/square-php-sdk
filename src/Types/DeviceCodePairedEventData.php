<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceCodePairedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the paired object’s type, `"device_code"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the paired device code.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?DeviceCodePairedEventObject $object An object containing the paired device code.
     */
    #[JsonProperty('object')]
    private ?DeviceCodePairedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?DeviceCodePairedEventObject,
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
     * @return ?DeviceCodePairedEventObject
     */
    public function getObject(): ?DeviceCodePairedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?DeviceCodePairedEventObject $value
     */
    public function setObject(?DeviceCodePairedEventObject $value = null): self
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
