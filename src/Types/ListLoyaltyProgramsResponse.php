<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that contains all loyalty programs.
 */
class ListLoyaltyProgramsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<LoyaltyProgram> $programs A list of `LoyaltyProgram` for the merchant.
     */
    #[JsonProperty('programs'), ArrayType([LoyaltyProgram::class])]
    private ?array $programs;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   programs?: ?array<LoyaltyProgram>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->programs = $values['programs'] ?? null;
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
     * @return ?array<LoyaltyProgram>
     */
    public function getPrograms(): ?array
    {
        return $this->programs;
    }

    /**
     * @param ?array<LoyaltyProgram> $value
     */
    public function setPrograms(?array $value = null): self
    {
        $this->programs = $value;
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
