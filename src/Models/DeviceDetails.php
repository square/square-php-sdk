<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Details about the device that took the payment.
 */
class DeviceDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string|null
     */
    private $deviceName;

    /**
     * Returns Device Id.
     *
     * Square-issued ID of the device.
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * Square-issued ID of the device.
     *
     * @maps device_id
     */
    public function setDeviceId(?string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Device Name.
     *
     * The name of the device set by the merchant.
     */
    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    /**
     * Sets Device Name.
     *
     * The name of the device set by the merchant.
     *
     * @maps device_name
     */
    public function setDeviceName(?string $deviceName): void
    {
        $this->deviceName = $deviceName;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['device_id']  = $this->deviceId;
        $json['device_name'] = $this->deviceName;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
