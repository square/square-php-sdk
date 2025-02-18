<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetDeviceCodeResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?DeviceCode $deviceCode The queried DeviceCode.
     */
    #[JsonProperty('device_code')]
    private ?DeviceCode $deviceCode;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   deviceCode?: ?DeviceCode,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->deviceCode = $values['deviceCode'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
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
