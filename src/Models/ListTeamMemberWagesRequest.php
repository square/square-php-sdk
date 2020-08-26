<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a set of `TeamMemberWage` objects
 */
class ListTeamMemberWagesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Team Member Id.
     *
     * Filter wages returned to only those that are associated with the
     * specified team member.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * Filter wages returned to only those that are associated with the
     * specified team member.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Limit.
     *
     * Maximum number of Team Member Wages to return per page. Can range between
     * 1 and 200. The default is the maximum at 200.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of Team Member Wages to return per page. Can range between
     * 1 and 200. The default is the maximum at 200.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * Pointer to the next page of Employee Wage results to fetch.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Pointer to the next page of Employee Wage results to fetch.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['team_member_id'] = $this->teamMemberId;
        $json['limit']        = $this->limit;
        $json['cursor']       = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
