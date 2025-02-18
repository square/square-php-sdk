<?php

namespace Square\Team\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Job;
use Square\Core\Json\JsonProperty;

class UpdateJobRequest extends JsonSerializableType
{
    /**
     * @var string $jobId The ID of the job to update.
     */
    private string $jobId;

    /**
     * The job with the updated fields, either `title`, `is_tip_eligible`, or both. Only changed fields need
     * to be included in the request. Optionally include `version` to enable optimistic concurrency control.
     *
     * @var Job $job
     */
    #[JsonProperty('job')]
    private Job $job;

    /**
     * @param array{
     *   jobId: string,
     *   job: Job,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobId = $values['jobId'];
        $this->job = $values['job'];
    }

    /**
     * @return string
     */
    public function getJobId(): string
    {
        return $this->jobId;
    }

    /**
     * @param string $value
     */
    public function setJobId(string $value): self
    {
        $this->jobId = $value;
        return $this;
    }

    /**
     * @return Job
     */
    public function getJob(): Job
    {
        return $this->job;
    }

    /**
     * @param Job $value
     */
    public function setJob(Job $value): self
    {
        $this->job = $value;
        return $this;
    }
}
