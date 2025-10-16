<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response for searching transfer orders
 */
class SearchTransferOrdersResponse extends JsonSerializableType
{
    /**
     * @var ?array<TransferOrder> $transferOrders List of transfer orders matching the search criteria
     */
    #[JsonProperty('transfer_orders'), ArrayType([TransferOrder::class])]
    private ?array $transferOrders;

    /**
     * @var ?string $cursor Pagination cursor for fetching the next page of results
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   transferOrders?: ?array<TransferOrder>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transferOrders = $values['transferOrders'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<TransferOrder>
     */
    public function getTransferOrders(): ?array
    {
        return $this->transferOrders;
    }

    /**
     * @param ?array<TransferOrder> $value
     */
    public function setTransferOrders(?array $value = null): self
    {
        $this->transferOrders = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
