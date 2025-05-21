<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents shift details for draft and published versions of a [scheduled shift](entity:ScheduledShift),
 * such as job ID, team member assignment, and start and end times.
 */
class ScheduledShiftDetails extends JsonSerializableType
{
    /**
     * @var ?string $teamMemberId The ID of the [team member](entity:TeamMember) scheduled for the shift.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?string $locationId The ID of the [location](entity:Location) the shift is scheduled for.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $jobId The ID of the [job](entity:Job) the shift is scheduled for.
     */
    #[JsonProperty('job_id')]
    private ?string $jobId;

    /**
     * The start time of the shift, in RFC 3339 format in the time zone &plus;
     * offset of the shift location specified in `location_id`. Precision up to the minute
     * is respected; seconds are truncated.
     *
     * @var ?string $startAt
     */
    #[JsonProperty('start_at')]
    private ?string $startAt;

    /**
     * The end time for the shift, in RFC 3339 format in the time zone &plus;
     * offset of the shift location specified in `location_id`. Precision up to the minute
     * is respected; seconds are truncated.
     *
     * @var ?string $endAt
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * @var ?string $notes Optional notes for the shift.
     */
    #[JsonProperty('notes')]
    private ?string $notes;

    /**
     * Indicates whether the draft shift version is deleted. If set to `true` when the shift
     * is published, the entire scheduled shift (including the published shift) is deleted and
     * cannot be accessed using any endpoint.
     *
     * @var ?bool $isDeleted
     */
    #[JsonProperty('is_deleted')]
    private ?bool $isDeleted;

    /**
     * The time zone of the shift location, calculated based on the `location_id`. This field
     * is provided for convenience.
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * @param array{
     *   teamMemberId?: ?string,
     *   locationId?: ?string,
     *   jobId?: ?string,
     *   startAt?: ?string,
     *   endAt?: ?string,
     *   notes?: ?string,
     *   isDeleted?: ?bool,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->startAt = $values['startAt'] ?? null;
        $this->endAt = $values['endAt'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->isDeleted = $values['isDeleted'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getJobId(): ?string
    {
        return $this->jobId;
    }

    /**
     * @param ?string $value
     */
    public function setJobId(?string $value = null): self
    {
        $this->jobId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * @param ?string $value
     */
    public function setStartAt(?string $value = null): self
    {
        $this->startAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndAt(): ?string
    {
        return $this->endAt;
    }

    /**
     * @param ?string $value
     */
    public function setEndAt(?string $value = null): self
    {
        $this->endAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param ?string $value
     */
    public function setNotes(?string $value = null): self
    {
        $this->notes = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    /**
     * @param ?bool $value
     */
    public function setIsDeleted(?bool $value = null): self
    {
        $this->isDeleted = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
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
