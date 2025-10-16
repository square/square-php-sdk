<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;

class GetTransferOrdersRequest extends JsonSerializableType
{
    /**
     * @var string $transferOrderId The ID of the transfer order to retrieve
     */
    private string $transferOrderId;

    /**
     * @param array{
     *   transferOrderId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderId = $values['transferOrderId'];
    }

    /**
     * @return string
     */
    public function getTransferOrderId(): string
    {
        return $this->transferOrderId;
    }

    /**
     * @param string $value
     */
    public function setTransferOrderId(string $value): self
    {
        $this->transferOrderId = $value;
        return $this;
    }
}
