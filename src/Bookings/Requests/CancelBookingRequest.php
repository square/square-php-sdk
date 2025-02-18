<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CancelBookingRequest extends JsonSerializableType
{
    /**
     * @var string $bookingId The ID of the [Booking](entity:Booking) object representing the to-be-cancelled booking.
     */
    private string $bookingId;

    /**
     * @var ?string $idempotencyKey A unique key to make this request an idempotent operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var ?int $bookingVersion The revision number for the booking used for optimistic concurrency.
     */
    #[JsonProperty('booking_version')]
    private ?int $bookingVersion;

    /**
     * @param array{
     *   bookingId: string,
     *   idempotencyKey?: ?string,
     *   bookingVersion?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bookingId = $values['bookingId'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->bookingVersion = $values['bookingVersion'] ?? null;
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
     * @return ?int
     */
    public function getBookingVersion(): ?int
    {
        return $this->bookingVersion;
    }

    /**
     * @param ?int $value
     */
    public function setBookingVersion(?int $value = null): self
    {
        $this->bookingVersion = $value;
        return $this;
    }
}
