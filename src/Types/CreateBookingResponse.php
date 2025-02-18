<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CreateBookingResponse extends JsonSerializableType
{
    /**
     * @var ?Booking $booking The booking that was created.
     */
    #[JsonProperty('booking')]
    private ?Booking $booking;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   booking?: ?Booking,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->booking = $values['booking'] ?? null;
        $this->errors = $values['errors'] ?? null;
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
