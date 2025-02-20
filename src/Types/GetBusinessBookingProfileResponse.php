<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetBusinessBookingProfileResponse extends JsonSerializableType
{
    /**
     * @var ?BusinessBookingProfile $businessBookingProfile The seller's booking profile.
     */
    #[JsonProperty('business_booking_profile')]
    private ?BusinessBookingProfile $businessBookingProfile;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   businessBookingProfile?: ?BusinessBookingProfile,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->businessBookingProfile = $values['businessBookingProfile'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?BusinessBookingProfile
     */
    public function getBusinessBookingProfile(): ?BusinessBookingProfile
    {
        return $this->businessBookingProfile;
    }

    /**
     * @param ?BusinessBookingProfile $value
     */
    public function setBusinessBookingProfile(?BusinessBookingProfile $value = null): self
    {
        $this->businessBookingProfile = $value;
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
