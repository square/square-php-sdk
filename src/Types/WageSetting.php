<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents information about the overtime exemption status, job assignments, and compensation
 * for a [team member](entity:TeamMember).
 */
class WageSetting extends JsonSerializableType
{
    /**
     * @var ?string $teamMemberId The ID of the team member associated with the wage setting.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * **Required** The ordered list of jobs that the team member is assigned to.
     * The first job assignment is considered the team member's primary job.
     *
     * @var ?array<JobAssignment> $jobAssignments
     */
    #[JsonProperty('job_assignments'), ArrayType([JobAssignment::class])]
    private ?array $jobAssignments;

    /**
     * @var ?bool $isOvertimeExempt Whether the team member is exempt from the overtime rules of the seller's country.
     */
    #[JsonProperty('is_overtime_exempt')]
    private ?bool $isOvertimeExempt;

    /**
     * **Read only** Used for resolving concurrency issues. The request fails if the version
     * provided does not match the server version at the time of the request. If not provided,
     * Square executes a blind write, potentially overwriting data from another write. For more information,
     * see [optimistic concurrency](https://developer.squareup.com/docs/working-with-apis/optimistic-concurrency).
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt The timestamp when the wage setting was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the wage setting was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   teamMemberId?: ?string,
     *   jobAssignments?: ?array<JobAssignment>,
     *   isOvertimeExempt?: ?bool,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->jobAssignments = $values['jobAssignments'] ?? null;
        $this->isOvertimeExempt = $values['isOvertimeExempt'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
     * @return ?array<JobAssignment>
     */
    public function getJobAssignments(): ?array
    {
        return $this->jobAssignments;
    }

    /**
     * @param ?array<JobAssignment> $value
     */
    public function setJobAssignments(?array $value = null): self
    {
        $this->jobAssignments = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsOvertimeExempt(): ?bool
    {
        return $this->isOvertimeExempt;
    }

    /**
     * @param ?bool $value
     */
    public function setIsOvertimeExempt(?bool $value = null): self
    {
        $this->isOvertimeExempt = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
