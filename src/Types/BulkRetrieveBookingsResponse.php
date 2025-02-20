<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response payload for bulk retrieval of bookings.
 */
class BulkRetrieveBookingsResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, GetBookingResponse> $bookings Requested bookings returned as a map containing `booking_id` as the key and `RetrieveBookingResponse` as the value.
     */
    #[JsonProperty('bookings'), ArrayType(['string' => GetBookingResponse::class])]
    private ?array $bookings;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   bookings?: ?array<string, GetBookingResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bookings = $values['bookings'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, GetBookingResponse>
     */
    public function getBookings(): ?array
    {
        return $this->bookings;
    }

    /**
     * @param ?array<string, GetBookingResponse> $value
     */
    public function setBookings(?array $value = null): self
    {
        $this->bookings = $value;
        return $this;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
