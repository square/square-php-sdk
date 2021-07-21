<?php

declare(strict_types=1);

namespace Square\Models;

class CreateDeviceCodeResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var DeviceCode|null
     */
    private $deviceCode;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Device Code.
     */
    public function getDeviceCode(): ?DeviceCode
    {
        return $this->deviceCode;
    }

    /**
     * Sets Device Code.
     *
     * @maps device_code
     */
    public function setDeviceCode(?DeviceCode $deviceCode): void
    {
        $this->deviceCode = $deviceCode;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']      = $this->errors;
        }
        if (isset($this->deviceCode)) {
            $json['device_code'] = $this->deviceCode;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
