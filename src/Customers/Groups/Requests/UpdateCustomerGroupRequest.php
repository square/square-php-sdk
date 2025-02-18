<?php

namespace Square\Customers\Groups\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomerGroup;
use Square\Core\Json\JsonProperty;

class UpdateCustomerGroupRequest extends JsonSerializableType
{
    /**
     * @var string $groupId The ID of the customer group to update.
     */
    private string $groupId;

    /**
     * @var CustomerGroup $group The `CustomerGroup` object including all the updates you want to make.
     */
    #[JsonProperty('group')]
    private CustomerGroup $group;

    /**
     * @param array{
     *   groupId: string,
     *   group: CustomerGroup,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->groupId = $values['groupId'];
        $this->group = $values['group'];
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

    /**
     * @return CustomerGroup
     */
    public function getGroup(): CustomerGroup
    {
        return $this->group;
    }

    /**
     * @param CustomerGroup $value
     */
    public function setGroup(CustomerGroup $value): self
    {
        $this->group = $value;
        return $this;
    }
}
