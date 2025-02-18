<?php

namespace Square\Customers\Groups\Requests;

use Square\Core\Json\JsonSerializableType;

class RemoveGroupsRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer to remove from the group.
     */
    private string $customerId;

    /**
     * @var string $groupId The ID of the customer group to remove the customer from.
     */
    private string $groupId;

    /**
     * @param array{
     *   customerId: string,
     *   groupId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->groupId = $values['groupId'];
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
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
