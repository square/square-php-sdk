<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetTeamMemberBookingProfileResponse extends JsonSerializableType
{
    /**
     * @var ?TeamMemberBookingProfile $teamMemberBookingProfile The returned team member booking profile.
     */
    #[JsonProperty('team_member_booking_profile')]
    private ?TeamMemberBookingProfile $teamMemberBookingProfile;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMemberBookingProfile?: ?TeamMemberBookingProfile,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberBookingProfile = $values['teamMemberBookingProfile'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?TeamMemberBookingProfile
     */
    public function getTeamMemberBookingProfile(): ?TeamMemberBookingProfile
    {
        return $this->teamMemberBookingProfile;
    }

    /**
     * @param ?TeamMemberBookingProfile $value
     */
    public function setTeamMemberBookingProfile(?TeamMemberBookingProfile $value = null): self
    {
        $this->teamMemberBookingProfile = $value;
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
