<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Booking;

class CreateBookingRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey A unique key to make this request an idempotent operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var Booking $booking The details of the booking to be created.
     */
    #[JsonProperty('booking')]
    private Booking $booking;

    /**
     * @param array{
     *   booking: Booking,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->booking = $values['booking'];
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return Booking
     */
    public function getBooking(): Booking
    {
        return $this->booking;
    }

    /**
     * @param Booking $value
     */
    public function setBooking(Booking $value): self
    {
        $this->booking = $value;
        return $this;
    }
}
