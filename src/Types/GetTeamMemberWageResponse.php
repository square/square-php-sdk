<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response to a request to get a `TeamMemberWage`. The response contains
 * the requested `TeamMemberWage` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetTeamMemberWageResponse extends JsonSerializableType
{
    /**
     * @var ?TeamMemberWage $teamMemberWage The requested `TeamMemberWage` object.
     */
    #[JsonProperty('team_member_wage')]
    private ?TeamMemberWage $teamMemberWage;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMemberWage?: ?TeamMemberWage,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberWage = $values['teamMemberWage'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?TeamMemberWage
     */
    public function getTeamMemberWage(): ?TeamMemberWage
    {
        return $this->teamMemberWage;
    }

    /**
     * @param ?TeamMemberWage $value
     */
    public function setTeamMemberWage(?TeamMemberWage $value = null): self
    {
        $this->teamMemberWage = $value;
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
