<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class JobUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Job $job The updated job.
     */
    #[JsonProperty('job')]
    private ?Job $job;

    /**
     * @param array{
     *   job?: ?Job,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->job = $values['job'] ?? null;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
