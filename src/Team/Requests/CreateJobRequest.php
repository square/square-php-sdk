<?php

namespace Square\Team\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Job;
use Square\Core\Json\JsonProperty;

class CreateJobRequest extends JsonSerializableType
{
    /**
     * @var Job $job The job to create. The `title` field is required and `is_tip_eligible` defaults to true.
     */
    #[JsonProperty('job')]
    private Job $job;

    /**
     * A unique identifier for the `CreateJob` request. Keys can be any valid string,
     * but must be unique for each request. For more information, see
     * [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   job: Job,
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->job = $values['job'];
        $this->idempotencyKey = $values['idempotencyKey'];
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

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }
}
