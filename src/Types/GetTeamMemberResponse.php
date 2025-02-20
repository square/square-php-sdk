<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from a retrieve request containing a `TeamMember` object or error messages.
 */
class GetTeamMemberResponse extends JsonSerializableType
{
    /**
     * @var ?TeamMember $teamMember The successfully retrieved `TeamMember` object.
     */
    #[JsonProperty('team_member')]
    private ?TeamMember $teamMember;

    /**
     * @var ?array<Error> $errors The errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMember?: ?TeamMember,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMember = $values['teamMember'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?TeamMember
     */
    public function getTeamMember(): ?TeamMember
    {
        return $this->teamMember;
    }

    /**
     * @param ?TeamMember $value
     */
    public function setTeamMember(?TeamMember $value = null): self
    {
        $this->teamMember = $value;
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
