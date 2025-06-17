<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BookingCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Booking $booking The created booking.
     */
    #[JsonProperty('booking')]
    private ?Booking $booking;

    /**
     * @param array{
     *   booking?: ?Booking,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->booking = $values['booking'] ?? null;
    }

    /**
     * @return ?Booking
     */
    public function getBooking(): ?Booking
    {
        return $this->booking;
    }

    /**
     * @param ?Booking $value
     */
    public function setBooking(?Booking $value = null): self
    {
        $this->booking = $value;
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
