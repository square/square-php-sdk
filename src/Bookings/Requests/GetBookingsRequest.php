<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;

class GetBookingsRequest extends JsonSerializableType
{
    /**
     * @var string $bookingId The ID of the [Booking](entity:Booking) object representing the to-be-retrieved booking.
     */
    private string $bookingId;

    /**
     * @param array{
     *   bookingId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bookingId = $values['bookingId'];
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
}
