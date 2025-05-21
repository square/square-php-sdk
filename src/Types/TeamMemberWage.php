<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Job and wage information for a [team member](entity:TeamMember).
 * This convenience object provides details needed to specify the `wage`
 * field for a [timecard](entity:Timecard).
 */
class TeamMemberWage extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $teamMemberId The `TeamMember` that this wage is assigned to.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?string $title The job title that this wage relates to.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * Can be a custom-set hourly wage or the calculated effective hourly
     * wage based on the annual wage and hours worked per week.
     *
     * @var ?Money $hourlyRate
     */
    #[JsonProperty('hourly_rate')]
    private ?Money $hourlyRate;

    /**
     * @var ?string $jobId An identifier for the [job](entity:Job) that this wage relates to.
     */
    #[JsonProperty('job_id')]
    private ?string $jobId;

    /**
     * @var ?bool $tipEligible Whether team members are eligible for tips when working this job.
     */
    #[JsonProperty('tip_eligible')]
    private ?bool $tipEligible;

    /**
     * @param array{
     *   id?: ?string,
     *   teamMemberId?: ?string,
     *   title?: ?string,
     *   hourlyRate?: ?Money,
     *   jobId?: ?string,
     *   tipEligible?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->hourlyRate = $values['hourlyRate'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->tipEligible = $values['tipEligible'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getHourlyRate(): ?Money
    {
        return $this->hourlyRate;
    }

    /**
     * @param ?Money $value
     */
    public function setHourlyRate(?Money $value = null): self
    {
        $this->hourlyRate = $value;
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
     * @return ?bool
     */
    public function getTipEligible(): ?bool
    {
        return $this->tipEligible;
    }

    /**
     * @param ?bool $value
     */
    public function setTipEligible(?bool $value = null): self
    {
        $this->tipEligible = $value;
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
