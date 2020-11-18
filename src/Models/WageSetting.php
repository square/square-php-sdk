<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * An object representing a team member's wage information.
 */
class WageSetting implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var JobAssignment[]|null
     */
    private $jobAssignments;

    /**
     * @var bool|null
     */
    private $isOvertimeExempt;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * Returns Team Member Id.
     *
     * The unique ID of the `TeamMember` whom this wage setting describes.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The unique ID of the `TeamMember` whom this wage setting describes.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Job Assignments.
     *
     * <b>Required</b> The ordered list of jobs that the team member is assigned to.
     * The first job assignment is considered the team member's "Primary Job".
     * <br>
     * <b>Min Length 1    Max Length 12</b>
     *
     * @return JobAssignment[]|null
     */
    public function getJobAssignments(): ?array
    {
        return $this->jobAssignments;
    }

    /**
     * Sets Job Assignments.
     *
     * <b>Required</b> The ordered list of jobs that the team member is assigned to.
     * The first job assignment is considered the team member's "Primary Job".
     * <br>
     * <b>Min Length 1    Max Length 12</b>
     *
     * @maps job_assignments
     *
     * @param JobAssignment[]|null $jobAssignments
     */
    public function setJobAssignments(?array $jobAssignments): void
    {
        $this->jobAssignments = $jobAssignments;
    }

    /**
     * Returns Is Overtime Exempt.
     *
     * Whether the team member is exempt from the overtime rules of the seller country.
     */
    public function getIsOvertimeExempt(): ?bool
    {
        return $this->isOvertimeExempt;
    }

    /**
     * Sets Is Overtime Exempt.
     *
     * Whether the team member is exempt from the overtime rules of the seller country.
     *
     * @maps is_overtime_exempt
     */
    public function setIsOvertimeExempt(?bool $isOvertimeExempt): void
    {
        $this->isOvertimeExempt = $isOvertimeExempt;
    }

    /**
     * Returns Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If not provided,
     * Square executes a blind write, potentially overwriting data from another write. Read
     * about [optimistic concurrency](https://developer.squareup.com/docs/working-with-apis/optimistic-
     * concurrency)
     * in Square APIs for more information.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If not provided,
     * Square executes a blind write, potentially overwriting data from another write. Read
     * about [optimistic concurrency](https://developer.squareup.com/docs/working-with-apis/optimistic-
     * concurrency)
     * in Square APIs for more information.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Created At.
     *
     * The timestamp in RFC 3339 format describing when the wage setting object was created.
     * Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z"
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp in RFC 3339 format describing when the wage setting object was created.
     * Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z"
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp in RFC 3339 format describing when the wage setting object was last updated.
     * Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z"
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp in RFC 3339 format describing when the wage setting object was last updated.
     * Ex: "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z"
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['team_member_id']   = $this->teamMemberId;
        $json['job_assignments']  = $this->jobAssignments;
        $json['is_overtime_exempt'] = $this->isOvertimeExempt;
        $json['version']          = $this->version;
        $json['created_at']       = $this->createdAt;
        $json['updated_at']       = $this->updatedAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
