<?php

namespace Square\Devices\Requests;

use Square\Core\Json\JsonSerializableType;

class GetDevicesRequest extends JsonSerializableType
{
    /**
     * @var string $deviceId The unique ID for the desired `Device`.
     */
    private string $deviceId;

    /**
     * @param array{
     *   deviceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deviceId = $values['deviceId'];
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $value
     */
    public function setDeviceId(string $value): self
    {
        $this->deviceId = $value;
        return $this;
    }
}
