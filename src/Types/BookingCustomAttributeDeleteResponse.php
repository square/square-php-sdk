<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response for an individual upsert request in a [BulkDeleteBookingCustomAttributes](api-endpoint:BookingCustomAttributes-BulkDeleteBookingCustomAttributes) operation.
 */
class BookingCustomAttributeDeleteResponse extends JsonSerializableType
{
    /**
     * @var ?string $bookingId The ID of the [booking](entity:Booking) associated with the custom attribute.
     */
    #[JsonProperty('booking_id')]
    private ?string $bookingId;

    /**
     * @var ?array<Error> $errors Any errors that occurred while processing the individual request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   bookingId?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bookingId = $values['bookingId'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    /**
     * @param ?string $value
     */
    public function setBookingId(?string $value = null): self
    {
        $this->bookingId = $value;
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
