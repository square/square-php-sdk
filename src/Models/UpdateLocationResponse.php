<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Response object returned by the [UpdateLocation](#endpoint-updatelocation) endpoint.
 */
class UpdateLocationResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * Returns Errors.
     *
     * Information on errors encountered during the request.
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
     * Information on errors encountered during the request.
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
     * Returns Location.
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Sets Location.
     *
     * @maps location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']   = $this->errors;
        $json['location'] = $this->location;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
