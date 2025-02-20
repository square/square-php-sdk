<?php

namespace Square\Team\Requests;

use Square\Core\Json\JsonSerializableType;

class RetrieveJobRequest extends JsonSerializableType
{
    /**
     * @var string $jobId The ID of the job to retrieve.
     */
    private string $jobId;

    /**
     * @param array{
     *   jobId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->jobId = $values['jobId'];
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
}
