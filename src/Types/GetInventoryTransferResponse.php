<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetInventoryTransferResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?InventoryTransfer $transfer The requested [InventoryTransfer](entity:InventoryTransfer).
     */
    #[JsonProperty('transfer')]
    private ?InventoryTransfer $transfer;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   transfer?: ?InventoryTransfer,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->transfer = $values['transfer'] ?? null;
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
     * @return ?InventoryTransfer
     */
    public function getTransfer(): ?InventoryTransfer
    {
        return $this->transfer;
    }

    /**
     * @param ?InventoryTransfer $value
     */
    public function setTransfer(?InventoryTransfer $value = null): self
    {
        $this->transfer = $value;
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
