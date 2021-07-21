<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents an update request for a `TeamMember` object.
 */
class UpdateTeamMemberRequest implements \JsonSerializable
{
    /**
     * @var TeamMember|null
     */
    private $teamMember;

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
        if (isset($this->teamMember)) {
            $json['team_member'] = $this->teamMember;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
