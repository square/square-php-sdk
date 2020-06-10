<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Only one of `order_entries` or `orders` fields will be set, depending on whether
 * `return_entries` was set on the [SearchOrdersRequest](#type-searchorderrequest).
 */
class SearchOrdersResponse implements \JsonSerializable
{
    /**
     * @var OrderEntry[]|null
     */
    private $orderEntries;

    /**
     * @var Order[]|null
     */
    private $orders;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Order Entries.
     *
     * List of [OrderEntries](#type-orderentry) that fit the query
     * conditions. Populated only if `return_entries` was set to `true` in the request.
     *
     * @return OrderEntry[]|null
     */
    public function getOrderEntries(): ?array
    {
        return $this->orderEntries;
    }

    /**
     * Sets Order Entries.
     *
     * List of [OrderEntries](#type-orderentry) that fit the query
     * conditions. Populated only if `return_entries` was set to `true` in the request.
     *
     * @maps order_entries
     *
     * @param OrderEntry[]|null $orderEntries
     */
    public function setOrderEntries(?array $orderEntries): void
    {
        $this->orderEntries = $orderEntries;
    }

    /**
     * Returns Orders.
     *
     * List of
     * [Order](#type-order) objects that match query conditions. Populated only if
     * `return_entries` in the request is set to `false`.
     *
     * @return Order[]|null
     */
    public function getOrders(): ?array
    {
        return $this->orders;
    }

    /**
     * Sets Orders.
     *
     * List of
     * [Order](#type-order) objects that match query conditions. Populated only if
     * `return_entries` in the request is set to `false`.
     *
     * @maps orders
     *
     * @param Order[]|null $orders
     */
    public function setOrders(?array $orders): void
    {
        $this->orders = $orders;
    }

    /**
     * Returns Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Errors.
     *
     * [Errors](#type-error) encountered during the search.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * [Errors](#type-error) encountered during the search.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order_entries'] = $this->orderEntries;
        $json['orders']       = $this->orders;
        $json['cursor']       = $this->cursor;
        $json['errors']       = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
