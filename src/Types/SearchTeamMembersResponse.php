<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from a search request containing a filtered list of `TeamMember` objects.
 */
class SearchTeamMembersResponse extends JsonSerializableType
{
    /**
     * @var ?array<TeamMember> $teamMembers The filtered list of `TeamMember` objects.
     */
    #[JsonProperty('team_members'), ArrayType([TeamMember::class])]
    private ?array $teamMembers;

    /**
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
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
     *   teamMembers?: ?array<TeamMember>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMembers = $values['teamMembers'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<TeamMember>
     */
    public function getTeamMembers(): ?array
    {
        return $this->teamMembers;
    }

    /**
     * @param ?array<TeamMember> $value
     */
    public function setTeamMembers(?array $value = null): self
    {
        $this->teamMembers = $value;
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
