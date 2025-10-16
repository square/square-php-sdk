<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\TransferOrderGoodsReceipt;

class ReceiveTransferOrderRequest extends JsonSerializableType
{
    /**
     * @var string $transferOrderId The ID of the transfer order to receive items for
     */
    private string $transferOrderId;

    /**
     * @var string $idempotencyKey A unique key to make this request idempotent
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var TransferOrderGoodsReceipt $receipt The receipt details
     */
    #[JsonProperty('receipt')]
    private TransferOrderGoodsReceipt $receipt;

    /**
     * @var ?int $version Version for optimistic concurrency
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   transferOrderId: string,
     *   idempotencyKey: string,
     *   receipt: TransferOrderGoodsReceipt,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderId = $values['transferOrderId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->receipt = $values['receipt'];
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
     * @return TransferOrderGoodsReceipt
     */
    public function getReceipt(): TransferOrderGoodsReceipt
    {
        return $this->receipt;
    }

    /**
     * @param TransferOrderGoodsReceipt $value
     */
    public function setReceipt(TransferOrderGoodsReceipt $value): self
    {
        $this->receipt = $value;
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
