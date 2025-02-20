<?php

namespace Square\Customers\Groups\Requests;

use Square\Core\Json\JsonSerializableType;

class GetGroupsRequest extends JsonSerializableType
{
    /**
     * @var string $groupId The ID of the customer group to retrieve.
     */
    private string $groupId;

    /**
     * @param array{
     *   groupId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->groupId = $values['groupId'];
    }

    /**
     * @return string
     */
    public function getGroupId(): string
    {
        return $this->groupId;
    }

    /**
     * @param string $value
     */
    public function setGroupId(string $value): self
    {
        $this->groupId = $value;
        return $this;
    }
}
