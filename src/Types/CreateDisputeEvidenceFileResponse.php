<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields in a `CreateDisputeEvidenceFile` response.
 */
class CreateDisputeEvidenceFileResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?DisputeEvidence $evidence The metadata of the newly uploaded dispute evidence.
     */
    #[JsonProperty('evidence')]
    private ?DisputeEvidence $evidence;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   evidence?: ?DisputeEvidence,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->evidence = $values['evidence'] ?? null;
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
     * @return ?DisputeEvidence
     */
    public function getEvidence(): ?DisputeEvidence
    {
        return $this->evidence;
    }

    /**
     * @param ?DisputeEvidence $value
     */
    public function setEvidence(?DisputeEvidence $value = null): self
    {
        $this->evidence = $value;
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
