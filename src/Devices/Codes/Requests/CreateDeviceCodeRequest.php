<?php

namespace Square\Devices\Codes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\DeviceCode;

class CreateDeviceCodeRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this CreateDeviceCode request. Keys can
     * be any valid string but must be unique for every CreateDeviceCode request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var DeviceCode $deviceCode The device code to create.
     */
    #[JsonProperty('device_code')]
    private DeviceCode $deviceCode;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   deviceCode: DeviceCode,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->deviceCode = $values['deviceCode'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return DeviceCode
     */
    public function getDeviceCode(): DeviceCode
    {
        return $this->deviceCode;
    }

    /**
     * @param DeviceCode $value
     */
    public function setDeviceCode(DeviceCode $value): self
    {
        $this->deviceCode = $value;
        return $this;
    }
}
