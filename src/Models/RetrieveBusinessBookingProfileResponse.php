<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveBusinessBookingProfileResponse implements \JsonSerializable
{
    /**
     * @var BusinessBookingProfile|null
     */
    private $businessBookingProfile;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Business Booking Profile.
     */
    public function getBusinessBookingProfile(): ?BusinessBookingProfile
    {
        return $this->businessBookingProfile;
    }

    /**
     * Sets Business Booking Profile.
     *
     * @maps business_booking_profile
     */
    public function setBusinessBookingProfile(?BusinessBookingProfile $businessBookingProfile): void
    {
        $this->businessBookingProfile = $businessBookingProfile;
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
        if (isset($this->businessBookingProfile)) {
            $json['business_booking_profile'] = $this->businessBookingProfile;
        }
        if (isset($this->errors)) {
            $json['errors']                   = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
