<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a job assigned to a [team member](entity:TeamMember), including the compensation the team
 * member earns for the job. Job assignments are listed in the team member's [wage setting](entity:WageSetting).
 */
class JobAssignment extends JsonSerializableType
{
    /**
     * @var ?string $jobTitle The title of the job.
     */
    #[JsonProperty('job_title')]
    private ?string $jobTitle;

    /**
     * The current pay type for the job assignment used to
     * calculate the pay amount in a pay period.
     * See [JobAssignmentPayType](#type-jobassignmentpaytype) for possible values
     *
     * @var value-of<JobAssignmentPayType> $payType
     */
    #[JsonProperty('pay_type')]
    private string $payType;

    /**
     * The hourly pay rate of the job. For `SALARY` pay types, Square calculates the hourly rate based on
     * `annual_rate` and `weekly_hours`.
     *
     * @var ?Money $hourlyRate
     */
    #[JsonProperty('hourly_rate')]
    private ?Money $hourlyRate;

    /**
     * @var ?Money $annualRate The total pay amount for a 12-month period on the job. Set if the job `PayType` is `SALARY`.
     */
    #[JsonProperty('annual_rate')]
    private ?Money $annualRate;

    /**
     * @var ?int $weeklyHours The planned hours per week for the job. Set if the job `PayType` is `SALARY`.
     */
    #[JsonProperty('weekly_hours')]
    private ?int $weeklyHours;

    /**
     * @var ?string $jobId The ID of the [job](entity:Job).
     */
    #[JsonProperty('job_id')]
    private ?string $jobId;

    /**
     * @param array{
     *   payType: value-of<JobAssignmentPayType>,
     *   jobTitle?: ?string,
     *   hourlyRate?: ?Money,
     *   annualRate?: ?Money,
     *   weeklyHours?: ?int,
     *   jobId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobTitle = $values['jobTitle'] ?? null;
        $this->payType = $values['payType'];
        $this->hourlyRate = $values['hourlyRate'] ?? null;
        $this->annualRate = $values['annualRate'] ?? null;
        $this->weeklyHours = $values['weeklyHours'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * @param ?string $value
     */
    public function setJobTitle(?string $value = null): self
    {
        $this->jobTitle = $value;
        return $this;
    }

    /**
     * @return value-of<JobAssignmentPayType>
     */
    public function getPayType(): string
    {
        return $this->payType;
    }

    /**
     * @param value-of<JobAssignmentPayType> $value
     */
    public function setPayType(string $value): self
    {
        $this->payType = $value;
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
     * @return ?Money
     */
    public function getAnnualRate(): ?Money
    {
        return $this->annualRate;
    }

    /**
     * @param ?Money $value
     */
    public function setAnnualRate(?Money $value = null): self
    {
        $this->annualRate = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getWeeklyHours(): ?int
    {
        return $this->weeklyHours;
    }

    /**
     * @param ?int $value
     */
    public function setWeeklyHours(?int $value = null): self
    {
        $this->weeklyHours = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
