<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\UpdateTransferOrderData;

class UpdateTransferOrderRequest extends JsonSerializableType
{
    /**
     * @var string $transferOrderId The ID of the transfer order to update
     */
    private string $transferOrderId;

    /**
     * @var string $idempotencyKey A unique string that identifies this UpdateTransferOrder request. Keys must contain only alphanumeric characters, dashes and underscores
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var UpdateTransferOrderData $transferOrder The transfer order updates to apply
     */
    #[JsonProperty('transfer_order')]
    private UpdateTransferOrderData $transferOrder;

    /**
     * @var ?int $version Version for optimistic concurrency
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   transferOrderId: string,
     *   idempotencyKey: string,
     *   transferOrder: UpdateTransferOrderData,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderId = $values['transferOrderId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->transferOrder = $values['transferOrder'];
        $this->version = $values['version'] ?? null;
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
     * @return UpdateTransferOrderData
     */
    public function getTransferOrder(): UpdateTransferOrderData
    {
        return $this->transferOrder;
    }

    /**
     * @param UpdateTransferOrderData $value
     */
    public function setTransferOrder(UpdateTransferOrderData $value): self
    {
        $this->transferOrder = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }
}
