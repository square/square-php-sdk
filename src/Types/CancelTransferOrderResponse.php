<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response for canceling a transfer order
 */
class CancelTransferOrderResponse extends JsonSerializableType
{
    /**
     * @var ?TransferOrder $transferOrder The updated transfer order with status changed to CANCELED
     */
    #[JsonProperty('transfer_order')]
    private ?TransferOrder $transferOrder;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   transferOrder?: ?TransferOrder,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transferOrder = $values['transferOrder'] ?? null;
        $this->errors = $values['errors'] ?? null;
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
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
