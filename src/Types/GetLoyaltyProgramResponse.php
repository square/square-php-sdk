<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response that contains the loyalty program.
 */
class GetLoyaltyProgramResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?LoyaltyProgram $program The loyalty program that was requested.
     */
    #[JsonProperty('program')]
    private ?LoyaltyProgram $program;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   program?: ?LoyaltyProgram,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->program = $values['program'] ?? null;
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
     * @return ?LoyaltyProgram
     */
    public function getProgram(): ?LoyaltyProgram
    {
        return $this->program;
    }

    /**
     * @param ?LoyaltyProgram $value
     */
    public function setProgram(?LoyaltyProgram $value = null): self
    {
        $this->program = $value;
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
