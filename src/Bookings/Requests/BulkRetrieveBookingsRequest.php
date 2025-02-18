<?php

namespace Square\Bookings\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkRetrieveBookingsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $bookingIds A non-empty list of [Booking](entity:Booking) IDs specifying bookings to retrieve.
     */
    #[JsonProperty('booking_ids'), ArrayType(['string'])]
    private array $bookingIds;

    /**
     * @param array{
     *   bookingIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bookingIds = $values['bookingIds'];
    }

    /**
     * @return array<string>
     */
    public function getBookingIds(): array
    {
        return $this->bookingIds;
    }

    /**
     * @param array<string> $value
     */
    public function setBookingIds(array $value): self
    {
        $this->bookingIds = $value;
        return $this;
    }
}
