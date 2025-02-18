<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;

class GetTransferInventoryRequest extends JsonSerializableType
{
    /**
     * @var string $transferId ID of the [InventoryTransfer](entity:InventoryTransfer) to retrieve.
     */
    private string $transferId;

    /**
     * @param array{
     *   transferId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferId = $values['transferId'];
    }

    /**
     * @return string
     */
    public function getTransferId(): string
    {
        return $this->transferId;
    }

    /**
     * @param string $value
     */
    public function setTransferId(string $value): self
    {
        $this->transferId = $value;
        return $this;
    }
}
