<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class RetrieveLocationBookingProfileResponse extends JsonSerializableType
{
    /**
     * @var ?LocationBookingProfile $locationBookingProfile The requested location booking profile.
     */
    #[JsonProperty('location_booking_profile')]
    private ?LocationBookingProfile $locationBookingProfile;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   locationBookingProfile?: ?LocationBookingProfile,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationBookingProfile = $values['locationBookingProfile'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?LocationBookingProfile
     */
    public function getLocationBookingProfile(): ?LocationBookingProfile
    {
        return $this->locationBookingProfile;
    }

    /**
     * @param ?LocationBookingProfile $value
     */
    public function setLocationBookingProfile(?LocationBookingProfile $value = null): self
    {
        $this->locationBookingProfile = $value;
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
