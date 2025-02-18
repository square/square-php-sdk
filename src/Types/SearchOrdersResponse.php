<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Either the `order_entries` or `orders` field is set, depending on whether
 * `return_entries` is set on the [SearchOrdersRequest](api-endpoint:Orders-SearchOrders).
 */
class SearchOrdersResponse extends JsonSerializableType
{
    /**
     * A list of [OrderEntries](entity:OrderEntry) that fit the query
     * conditions. The list is populated only if `return_entries` is set to `true` in the request.
     *
     * @var ?array<OrderEntry> $orderEntries
     */
    #[JsonProperty('order_entries'), ArrayType([OrderEntry::class])]
    private ?array $orderEntries;

    /**
     * A list of
     * [Order](entity:Order) objects that match the query conditions. The list is populated only if
     * `return_entries` is set to `false` in the request.
     *
     * @var ?array<Order> $orders
     */
    #[JsonProperty('orders'), ArrayType([Order::class])]
    private ?array $orders;

    /**
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors [Errors](entity:Error) encountered during the search.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   orderEntries?: ?array<OrderEntry>,
     *   orders?: ?array<Order>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderEntries = $values['orderEntries'] ?? null;
        $this->orders = $values['orders'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<OrderEntry>
     */
    public function getOrderEntries(): ?array
    {
        return $this->orderEntries;
    }

    /**
     * @param ?array<OrderEntry> $value
     */
    public function setOrderEntries(?array $value = null): self
    {
        $this->orderEntries = $value;
        return $this;
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
