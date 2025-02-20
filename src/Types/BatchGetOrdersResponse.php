<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the `BatchRetrieveOrders` endpoint.
 */
class BatchGetOrdersResponse extends JsonSerializableType
{
    /**
     * @var ?array<Order> $orders The requested orders. This will omit any requested orders that do not exist.
     */
    #[JsonProperty('orders'), ArrayType([Order::class])]
    private ?array $orders;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   orders?: ?array<Order>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orders = $values['orders'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Order>
     */
    public function getOrders(): ?array
    {
        return $this->orders;
    }

    /**
     * @param ?array<Order> $value
     */
    public function setOrders(?array $value = null): self
    {
        $this->orders = $value;
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
