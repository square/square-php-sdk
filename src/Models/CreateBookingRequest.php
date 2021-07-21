<?php

declare(strict_types=1);

namespace Square\Models;

class CreateBookingRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var Booking
     */
    private $booking;

    /**
     * @param Booking $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique key to make this request an idempotent operation.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique key to make this request an idempotent operation.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Booking.
     *
     * Represents a booking as a time-bound service contract for a seller's staff member to provide a
     * specified service
     * at a given location to a requesting customer in one or more appointment segments.
     */
    public function getBooking(): Booking
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
     * @required
     * @maps booking
     */
    public function setBooking(Booking $booking): void
    {
        $this->booking = $booking;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        $json['booking']             = $this->booking;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
