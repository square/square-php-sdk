<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;

class GetPhysicalCountInventoryRequest extends JsonSerializableType
{
    /**
     * ID of the
     * [InventoryPhysicalCount](entity:InventoryPhysicalCount) to retrieve.
     *
     * @var string $physicalCountId
     */
    private string $physicalCountId;

    /**
     * @param array{
     *   physicalCountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->physicalCountId = $values['physicalCountId'];
    }

    /**
     * @return string
     */
    public function getPhysicalCountId(): string
    {
        return $this->physicalCountId;
    }

    /**
     * @param string $value
     */
    public function setPhysicalCountId(string $value): self
    {
        $this->physicalCountId = $value;
        return $this;
    }
}
