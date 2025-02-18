<?php

namespace Square\Bookings\CustomAttributes\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteCustomAttributesRequest extends JsonSerializableType
{
    /**
     * @var string $bookingId The ID of the target [booking](entity:Booking).
     */
    private string $bookingId;

    /**
     * The key of the custom attribute to delete. This key must match the `key` of a custom
     * attribute definition in the Square seller account. If the requesting application is not the
     * definition owner, you must use the qualified key.
     *
     * @var string $key
     */
    private string $key;

    /**
     * @param array{
     *   bookingId: string,
     *   key: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bookingId = $values['bookingId'];
        $this->key = $values['key'];
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
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setKey(string $value): self
    {
        $this->key = $value;
        return $this;
    }
}
