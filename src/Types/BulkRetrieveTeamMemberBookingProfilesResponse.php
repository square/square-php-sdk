<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response payload for the [BulkRetrieveTeamMemberBookingProfiles](api-endpoint:Bookings-BulkRetrieveTeamMemberBookingProfiles) endpoint.
 */
class BulkRetrieveTeamMemberBookingProfilesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, GetTeamMemberBookingProfileResponse> $teamMemberBookingProfiles The returned team members' booking profiles, as a map with `team_member_id` as the key and [TeamMemberBookingProfile](entity:TeamMemberBookingProfile) the value.
     */
    #[JsonProperty('team_member_booking_profiles'), ArrayType(['string' => GetTeamMemberBookingProfileResponse::class])]
    private ?array $teamMemberBookingProfiles;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMemberBookingProfiles?: ?array<string, GetTeamMemberBookingProfileResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberBookingProfiles = $values['teamMemberBookingProfiles'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, GetTeamMemberBookingProfileResponse>
     */
    public function getTeamMemberBookingProfiles(): ?array
    {
        return $this->teamMemberBookingProfiles;
    }

    /**
     * @param ?array<string, GetTeamMemberBookingProfileResponse> $value
     */
    public function setTeamMemberBookingProfiles(?array $value = null): self
    {
        $this->teamMemberBookingProfiles = $value;
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
