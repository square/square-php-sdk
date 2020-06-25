<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a create request for a `TeamMember` object.
 */
class CreateTeamMemberRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var TeamMember|null
     */
    private $teamMember;

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this CreateTeamMember request.
     * Keys can be any valid string but must be unique for every request.
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     * <br>
     * <b>Min Length 1    Max Length 45</b>
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this CreateTeamMember request.
     * Keys can be any valid string but must be unique for every request.
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     * <br>
     * <b>Min Length 1    Max Length 45</b>
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Team Member.
     *
     * A record representing an individual team member for a business.
     */
    public function getTeamMember(): ?TeamMember
    {
        return $this->teamMember;
    }

    /**
     * Sets Team Member.
     *
     * A record representing an individual team member for a business.
     *
     * @maps team_member
     */
    public function setTeamMember(?TeamMember $teamMember): void
    {
        $this->teamMember = $teamMember;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['team_member']    = $this->teamMember;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
