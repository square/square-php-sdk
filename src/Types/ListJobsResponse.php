<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [ListJobs](api-endpoint:Team-ListJobs) response. Either `jobs` or `errors`
 * is present in the response. If additional results are available, the `cursor` field is also present.
 */
class ListJobsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Job> $jobs The retrieved jobs. A single paged response contains up to 100 jobs.
     */
    #[JsonProperty('jobs'), ArrayType([Job::class])]
    private ?array $jobs;

    /**
     * An opaque cursor used to retrieve the next page of results. This field is present only
     * if the request succeeded and additional results are available. For more information, see
     * [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors The errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   jobs?: ?array<Job>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->jobs = $values['jobs'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Job>
     */
    public function getJobs(): ?array
    {
        return $this->jobs;
    }

    /**
     * @param ?array<Job> $value
     */
    public function setJobs(?array $value = null): self
    {
        $this->jobs = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
