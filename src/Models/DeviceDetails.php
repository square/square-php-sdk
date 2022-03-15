<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
    private $deviceInstallationId;

    /**
     * @var string|null
     */
    private $deviceName;

    /**
     * Returns Device Id.
     *
     * The Square-issued ID of the device.
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The Square-issued ID of the device.
     *
     * @maps device_id
     */
    public function setDeviceId(?string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Device Installation Id.
     *
     * The Square-issued installation ID for the device.
     */
    public function getDeviceInstallationId(): ?string
    {
        return $this->deviceInstallationId;
    }

    /**
     * Sets Device Installation Id.
     *
     * The Square-issued installation ID for the device.
     *
     * @maps device_installation_id
     */
    public function setDeviceInstallationId(?string $deviceInstallationId): void
    {
        $this->deviceInstallationId = $deviceInstallationId;
    }

    /**
     * Returns Device Name.
     *
     * The name of the device set by the seller.
     */
    public function getDeviceName(): ?string
    {
        return $this->deviceName;
    }

    /**
     * Sets Device Name.
     *
     * The name of the device set by the seller.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->deviceId)) {
            $json['device_id']              = $this->deviceId;
        }
        if (isset($this->deviceInstallationId)) {
            $json['device_installation_id'] = $this->deviceInstallationId;
        }
        if (isset($this->deviceName)) {
            $json['device_name']            = $this->deviceName;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
