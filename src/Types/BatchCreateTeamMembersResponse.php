<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from a bulk create request containing the created `TeamMember` objects or error messages.
 */
class BatchCreateTeamMembersResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, CreateTeamMemberResponse> $teamMembers The successfully created `TeamMember` objects. Each key is the `idempotency_key` that maps to the `CreateTeamMemberRequest`.
     */
    #[JsonProperty('team_members'), ArrayType(['string' => CreateTeamMemberResponse::class])]
    private ?array $teamMembers;

    /**
     * @var ?array<Error> $errors The errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMembers?: ?array<string, CreateTeamMemberResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMembers = $values['teamMembers'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, CreateTeamMemberResponse>
     */
    public function getTeamMembers(): ?array
    {
        return $this->teamMembers;
    }

    /**
     * @param ?array<string, CreateTeamMemberResponse> $value
     */
    public function setTeamMembers(?array $value = null): self
    {
        $this->teamMembers = $value;
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
