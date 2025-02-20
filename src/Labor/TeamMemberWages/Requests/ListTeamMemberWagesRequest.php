<?php

namespace Square\Labor\TeamMemberWages\Requests;

use Square\Core\Json\JsonSerializableType;

class ListTeamMemberWagesRequest extends JsonSerializableType
{
    /**
     * Filter the returned wages to only those that are associated with the
     * specified team member.
     *
     * @var ?string $teamMemberId
     */
    private ?string $teamMemberId;

    /**
     * The maximum number of `TeamMemberWage` results to return per page. The number can range between
     * 1 and 200. The default is 200.
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @var ?string $cursor A pointer to the next page of `EmployeeWage` results to fetch.
     */
    private ?string $cursor;

    /**
     * @param array{
     *   teamMemberId?: ?string,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
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
}
