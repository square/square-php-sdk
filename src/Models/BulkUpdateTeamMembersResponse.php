<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a response from a bulk update request containing the updated `TeamMember` objects or
 * error messages.
 */
class BulkUpdateTeamMembersResponse implements \JsonSerializable
{
    /**
     * @var array|null
     */
    private $teamMembers;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Members.
     *
     * The successfully updated `TeamMember` objects. Each key is the `team_member_id` that maps to the
     * `UpdateTeamMemberRequest`.
     */
    public function getTeamMembers(): ?array
    {
        return $this->teamMembers;
    }

    /**
     * Sets Team Members.
     *
     * The successfully updated `TeamMember` objects. Each key is the `team_member_id` that maps to the
     * `UpdateTeamMemberRequest`.
     *
     * @maps team_members
     */
    public function setTeamMembers(?array $teamMembers): void
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Returns Errors.
     *
     * The errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * The errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->teamMembers)) {
            $json['team_members'] = $this->teamMembers;
        }
        if (isset($this->errors)) {
            $json['errors']       = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
