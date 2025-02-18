<?php

namespace Square\Customers\Groups\Requests;

use Square\Core\Json\JsonSerializableType;

class AddGroupsRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer to add to a group.
     */
    private string $customerId;

    /**
     * @var string $groupId The ID of the customer group to add the customer to.
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
