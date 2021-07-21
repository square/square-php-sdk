<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveBookingResponse implements \JsonSerializable
{
    /**
     * @var Booking|null
     */
    private $booking;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Booking.
     *
     * Represents a booking as a time-bound service contract for a seller's staff member to provide a
     * specified service
     * at a given location to a requesting customer in one or more appointment segments.
     */
    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    /**
     * Sets Booking.
     *
     * Represents a booking as a time-bound service contract for a seller's staff member to provide a
     * specified service
     * at a given location to a requesting customer in one or more appointment segments.
     *
     * @maps booking
     */
    public function setBooking(?Booking $booking): void
    {
        $this->booking = $booking;
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
        if (isset($this->booking)) {
            $json['booking'] = $this->booking;
        }
        if (isset($this->errors)) {
            $json['errors']  = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
