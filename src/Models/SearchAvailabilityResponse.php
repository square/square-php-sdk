<?php

declare(strict_types=1);

namespace Square\Models;

class SearchAvailabilityResponse implements \JsonSerializable
{
    /**
     * @var Availability[]|null
     */
    private $availabilities;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Availabilities.
     *
     * List of slots available for booking.
     *
     * @return Availability[]|null
     */
    public function getAvailabilities(): ?array
    {
        return $this->availabilities;
    }

    /**
     * Sets Availabilities.
     *
     * List of slots available for booking.
     *
     * @maps availabilities
     *
     * @param Availability[]|null $availabilities
     */
    public function setAvailabilities(?array $availabilities): void
    {
        $this->availabilities = $availabilities;
    }

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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->availabilities)) {
            $json['availabilities'] = $this->availabilities;
        }
        if (isset($this->errors)) {
            $json['errors']         = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
