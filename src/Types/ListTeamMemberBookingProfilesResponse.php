<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListTeamMemberBookingProfilesResponse extends JsonSerializableType
{
    /**
     * The list of team member booking profiles. The results are returned in the ascending order of the time
     * when the team member booking profiles were last updated. Multiple booking profiles updated at the same time
     * are further sorted in the ascending order of their IDs.
     *
     * @var ?array<TeamMemberBookingProfile> $teamMemberBookingProfiles
     */
    #[JsonProperty('team_member_booking_profiles'), ArrayType([TeamMemberBookingProfile::class])]
    private ?array $teamMemberBookingProfiles;

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
     *   teamMemberBookingProfiles?: ?array<TeamMemberBookingProfile>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberBookingProfiles = $values['teamMemberBookingProfiles'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<TeamMemberBookingProfile>
     */
    public function getTeamMemberBookingProfiles(): ?array
    {
        return $this->teamMemberBookingProfiles;
    }

    /**
     * @param ?array<TeamMemberBookingProfile> $value
     */
    public function setTeamMemberBookingProfiles(?array $value = null): self
    {
        $this->teamMemberBookingProfiles = $value;
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
