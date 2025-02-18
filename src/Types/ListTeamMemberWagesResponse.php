<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for a set of `TeamMemberWage` objects. The response contains
 * a set of `TeamMemberWage` objects.
 */
class ListTeamMemberWagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<TeamMemberWage> $teamMemberWages A page of `TeamMemberWage` results.
     */
    #[JsonProperty('team_member_wages'), ArrayType([TeamMemberWage::class])]
    private ?array $teamMemberWages;

    /**
     * The value supplied in the subsequent request to fetch the next page
     * of `TeamMemberWage` results.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   teamMemberWages?: ?array<TeamMemberWage>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberWages = $values['teamMemberWages'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<TeamMemberWage>
     */
    public function getTeamMemberWages(): ?array
    {
        return $this->teamMemberWages;
    }

    /**
     * @param ?array<TeamMemberWage> $value
     */
    public function setTeamMemberWages(?array $value = null): self
    {
        $this->teamMemberWages = $value;
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
