<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TransferOrderUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?TransferOrder $transferOrder The updated transfer_order.
     */
    #[JsonProperty('transfer_order')]
    private ?TransferOrder $transferOrder;

    /**
     * @param array{
     *   transferOrder?: ?TransferOrder,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transferOrder = $values['transferOrder'] ?? null;
    }

    /**
     * @return ?TransferOrder
     */
    public function getTransferOrder(): ?TransferOrder
    {
        return $this->transferOrder;
    }

    /**
     * @param ?TransferOrder $value
     */
    public function setTransferOrder(?TransferOrder $value = null): self
    {
        $this->transferOrder = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
