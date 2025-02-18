<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details about the device that took the payment.
 */
class DeviceDetails extends JsonSerializableType
{
    /**
     * @var ?string $deviceId The Square-issued ID of the device.
     */
    #[JsonProperty('device_id')]
    private ?string $deviceId;

    /**
     * @var ?string $deviceInstallationId The Square-issued installation ID for the device.
     */
    #[JsonProperty('device_installation_id')]
    private ?string $deviceInstallationId;

    /**
     * @var ?string $deviceName The name of the device set by the seller.
     */
    #[JsonProperty('device_name')]
    private ?string $deviceName;

    /**
     * @param array{
     *   deviceId?: ?string,
     *   deviceInstallationId?: ?string,
     *   deviceName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->deviceId = $values['deviceId'] ?? null;
        $this->deviceInstallationId = $values['deviceInstallationId'] ?? null;
        $this->deviceName = $values['deviceName'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceId(?string $value = null): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeviceInstallationId(): ?string
    {
        return $this->deviceInstallationId;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceInstallationId(?string $value = null): self
    {
        $this->deviceInstallationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    /**
     * @param ?string $value
     */
    public function setDeviceName(?string $value = null): self
    {
        $this->deviceName = $value;
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
