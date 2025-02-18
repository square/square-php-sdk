<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields in a `ListDisputeEvidence` response.
 */
class ListDisputeEvidenceResponse extends JsonSerializableType
{
    /**
     * @var ?array<DisputeEvidence> $evidence The list of evidence previously uploaded to the specified dispute.
     */
    #[JsonProperty('evidence'), ArrayType([DisputeEvidence::class])]
    private ?array $evidence;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The pagination cursor to be used in a subsequent request.
     * If unset, this is the final response. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   evidence?: ?array<DisputeEvidence>,
     *   errors?: ?array<Error>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->evidence = $values['evidence'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?array<DisputeEvidence>
     */
    public function getEvidence(): ?array
    {
        return $this->evidence;
    }

    /**
     * @param ?array<DisputeEvidence> $value
     */
    public function setEvidence(?array $value = null): self
    {
        $this->evidence = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
