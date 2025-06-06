<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Filter for `Order` objects based on whether their `CREATED_AT`,
 * `CLOSED_AT`, or `UPDATED_AT` timestamps fall within a specified time range.
 * You can specify the time range and which timestamp to filter for. You can filter
 * for only one time range at a time.
 *
 * For each time range, the start time and end time are inclusive. If the end time
 * is absent, it defaults to the time of the first request for the cursor.
 *
 * __Important:__ If you use the `DateTimeFilter` in a `SearchOrders` query,
 * you must set the `sort_field` in [OrdersSort](entity:SearchOrdersSort)
 * to the same field you filter for. For example, if you set the `CLOSED_AT` field
 * in `DateTimeFilter`, you must set the `sort_field` in `SearchOrdersSort` to
 * `CLOSED_AT`. Otherwise, `SearchOrders` throws an error.
 * [Learn more about filtering orders by time range.](https://developer.squareup.com/docs/orders-api/manage-orders/search-orders#important-note-about-filtering-orders-by-time-range)
 */
class SearchOrdersDateTimeFilter extends JsonSerializableType
{
    /**
     * The time range for filtering on the `created_at` timestamp. If you use this
     * value, you must set the `sort_field` in the `OrdersSearchSort` object to
     * `CREATED_AT`.
     *
     * @var ?TimeRange $createdAt
     */
    #[JsonProperty('created_at')]
    private ?TimeRange $createdAt;

    /**
     * The time range for filtering on the `updated_at` timestamp. If you use this
     * value, you must set the `sort_field` in the `OrdersSearchSort` object to
     * `UPDATED_AT`.
     *
     * @var ?TimeRange $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?TimeRange $updatedAt;

    /**
     * The time range for filtering on the `closed_at` timestamp. If you use this
     * value, you must set the `sort_field` in the `OrdersSearchSort` object to
     * `CLOSED_AT`.
     *
     * @var ?TimeRange $closedAt
     */
    #[JsonProperty('closed_at')]
    private ?TimeRange $closedAt;

    /**
     * @param array{
     *   createdAt?: ?TimeRange,
     *   updatedAt?: ?TimeRange,
     *   closedAt?: ?TimeRange,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->closedAt = $values['closedAt'] ?? null;
    }

    /**
     * @return ?TimeRange
     */
    public function getCreatedAt(): ?TimeRange
    {
        return $this->createdAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setCreatedAt(?TimeRange $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getUpdatedAt(): ?TimeRange
    {
        return $this->updatedAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setUpdatedAt(?TimeRange $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getClosedAt(): ?TimeRange
    {
        return $this->closedAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setClosedAt(?TimeRange $value = null): self
    {
        $this->closedAt = $value;
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
