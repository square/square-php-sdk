<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceCodePairedEventObject extends JsonSerializableType
{
    /**
     * @var ?DeviceCode $deviceCode The created terminal checkout
     */
    #[JsonProperty('device_code')]
    private ?DeviceCode $deviceCode;

    /**
     * @param array{
     *   deviceCode?: ?DeviceCode,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deviceCode = $values['deviceCode'] ?? null;
    }

    /**
     * @return ?DeviceCode
     */
    public function getDeviceCode(): ?DeviceCode
    {
        return $this->deviceCode;
    }

    /**
     * @param ?DeviceCode $value
     */
    public function setDeviceCode(?DeviceCode $value = null): self
    {
        $this->deviceCode = $value;
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
