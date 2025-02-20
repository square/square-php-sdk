<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines fields in a `RetrieveDispute` response.
 */
class GetDisputeResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Dispute $dispute Details about the requested `Dispute`.
     */
    #[JsonProperty('dispute')]
    private ?Dispute $dispute;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   dispute?: ?Dispute,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->dispute = $values['dispute'] ?? null;
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
     * @return ?Dispute
     */
    public function getDispute(): ?Dispute
    {
        return $this->dispute;
    }

    /**
     * @param ?Dispute $value
     */
    public function setDispute(?Dispute $value = null): self
    {
        $this->dispute = $value;
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
