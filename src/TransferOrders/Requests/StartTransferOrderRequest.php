<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class StartTransferOrderRequest extends JsonSerializableType
{
    /**
     * @var string $transferOrderId The ID of the transfer order to start. Must be in DRAFT status.
     */
    private string $transferOrderId;

    /**
     * A unique string that identifies this UpdateTransferOrder request. Keys can be
     * any valid string but must be unique for every UpdateTransferOrder request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var ?int $version Version for optimistic concurrency
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @param array{
     *   transferOrderId: string,
     *   idempotencyKey: string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderId = $values['transferOrderId'];
        $this->idempotencyKey = $values['idempotencyKey'];
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
