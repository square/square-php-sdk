<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Booking;

class UpdateBookingRequest extends JsonSerializableType
{
    /**
     * @var string $bookingId The ID of the [Booking](entity:Booking) object representing the to-be-updated booking.
     */
    private string $bookingId;

    /**
     * @var ?string $idempotencyKey A unique key to make this request an idempotent operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var Booking $booking The booking to be updated. Individual attributes explicitly specified here override the corresponding values of the existing booking.
     */
    #[JsonProperty('booking')]
    private Booking $booking;

    /**
     * @param array{
     *   bookingId: string,
     *   booking: Booking,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bookingId = $values['bookingId'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->booking = $values['booking'];
    }

    /**
     * @return string
     */
    public function getBookingId(): string
    {
        return $this->bookingId;
    }

    /**
     * @param string $value
     */
    public function setBookingId(string $value): self
    {
        $this->bookingId = $value;
        return $this;
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
