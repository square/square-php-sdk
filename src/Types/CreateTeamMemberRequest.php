<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a create request for a `TeamMember` object.
 */
class CreateTeamMemberRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreateTeamMember` request.
     * Keys can be any valid string, but must be unique for every request.
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * The minimum length is 1 and the maximum length is 45.
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * **Required** The data used to create the `TeamMember` object. If you include `wage_setting`, you must provide
     * `job_id` for each job assignment. To get job IDs, call [ListJobs](api-endpoint:Team-ListJobs).
     *
     * @var ?TeamMember $teamMember
     */
    #[JsonProperty('team_member')]
    private ?TeamMember $teamMember;

    /**
     * @param array{
     *   idempotencyKey?: ?string,
     *   teamMember?: ?TeamMember,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->teamMember = $values['teamMember'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
