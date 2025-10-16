<?php

namespace Square\TransferOrders\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteTransferOrdersRequest extends JsonSerializableType
{
    /**
     * @var string $transferOrderId The ID of the transfer order to delete
     */
    private string $transferOrderId;

    /**
     * @var ?int $version Version for optimistic concurrency
     */
    private ?int $version;

    /**
     * @param array{
     *   transferOrderId: string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferOrderId = $values['transferOrderId'];
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
