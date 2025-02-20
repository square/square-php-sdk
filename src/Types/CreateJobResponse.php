<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [CreateJob](api-endpoint:Team-CreateJob) response. Either `job` or `errors`
 * is present in the response.
 */
class CreateJobResponse extends JsonSerializableType
{
    /**
     * @var ?Job $job The new job.
     */
    #[JsonProperty('job')]
    private ?Job $job;

    /**
     * @var ?array<Error> $errors The errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   job?: ?Job,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->job = $values['job'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Job
     */
    public function getJob(): ?Job
    {
        return $this->job;
    }

    /**
     * @param ?Job $value
     */
    public function setJob(?Job $value = null): self
    {
        $this->job = $value;
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
