<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Device $device The created device.
     */
    #[JsonProperty('device')]
    private ?Device $device;

    /**
     * @param array{
     *   device?: ?Device,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->device = $values['device'] ?? null;
    }

    /**
     * @return ?Device
     */
    public function getDevice(): ?Device
    {
        return $this->device;
    }

    /**
     * @param ?Device $value
     */
    public function setDevice(?Device $value = null): self
    {
        $this->device = $value;
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
