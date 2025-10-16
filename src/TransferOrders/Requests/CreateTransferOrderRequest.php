<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CreateTransferOrderData;

class CreateTransferOrderRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this CreateTransferOrder request. Keys can be
     * any valid string but must be unique for every CreateTransferOrder request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var CreateTransferOrderData $transferOrder The transfer order to create
     */
    #[JsonProperty('transfer_order')]
    private CreateTransferOrderData $transferOrder;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   transferOrder: CreateTransferOrderData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->transferOrder = $values['transferOrder'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return CreateTransferOrderData
     */
    public function getTransferOrder(): CreateTransferOrderData
    {
        return $this->transferOrder;
    }

    /**
     * @param CreateTransferOrderData $value
     */
    public function setTransferOrder(CreateTransferOrderData $value): self
    {
        $this->transferOrder = $value;
        return $this;
    }
}
