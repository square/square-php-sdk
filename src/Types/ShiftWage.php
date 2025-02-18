<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The hourly wage rate used to compensate an employee for this shift.
 */
class ShiftWage extends JsonSerializableType
{
    /**
     * @var ?string $title The name of the job performed during this shift.
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
     * The id of the job performed during this shift. Square
     * labor-reporting UIs might group shifts together by id. This cannot be used to retrieve the job.
     *
     * @var ?string $jobId
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
     *   title?: ?string,
     *   hourlyRate?: ?Money,
     *   jobId?: ?string,
     *   tipEligible?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->title = $values['title'] ?? null;
        $this->hourlyRate = $values['hourlyRate'] ?? null;
        $this->jobId = $values['jobId'] ?? null;
        $this->tipEligible = $values['tipEligible'] ?? null;
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
