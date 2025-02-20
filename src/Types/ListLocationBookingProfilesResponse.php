<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListLocationBookingProfilesResponse extends JsonSerializableType
{
    /**
     * @var ?array<LocationBookingProfile> $locationBookingProfiles The list of a seller's location booking profiles.
     */
    #[JsonProperty('location_booking_profiles'), ArrayType([LocationBookingProfile::class])]
    private ?array $locationBookingProfiles;

    /**
     * @var ?string $cursor The pagination cursor to be used in the subsequent request to get the next page of the results. Stop retrieving the next page of the results when the cursor is not set.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   locationBookingProfiles?: ?array<LocationBookingProfile>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationBookingProfiles = $values['locationBookingProfiles'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<LocationBookingProfile>
     */
    public function getLocationBookingProfiles(): ?array
    {
        return $this->locationBookingProfiles;
    }

    /**
     * @param ?array<LocationBookingProfile> $value
     */
    public function setLocationBookingProfiles(?array $value = null): self
    {
        $this->locationBookingProfiles = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
