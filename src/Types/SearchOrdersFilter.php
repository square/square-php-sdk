<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Filtering criteria to use for a `SearchOrders` request. Multiple filters
 * are ANDed together.
 */
class SearchOrdersFilter extends JsonSerializableType
{
    /**
     * @var ?SearchOrdersStateFilter $stateFilter Filter by [OrderState](entity:OrderState).
     */
    #[JsonProperty('state_filter')]
    private ?SearchOrdersStateFilter $stateFilter;

    /**
     * Filter for results within a time range.
     *
     * __Important:__ If you filter for orders by time range, you must set `SearchOrdersSort`
     * to sort by the same field.
     * [Learn more about filtering orders by time range.](https://developer.squareup.com/docs/orders-api/manage-orders/search-orders#important-note-about-filtering-orders-by-time-range)
     *
     * @var ?SearchOrdersDateTimeFilter $dateTimeFilter
     */
    #[JsonProperty('date_time_filter')]
    private ?SearchOrdersDateTimeFilter $dateTimeFilter;

    /**
     * @var ?SearchOrdersFulfillmentFilter $fulfillmentFilter Filter by the fulfillment type or state.
     */
    #[JsonProperty('fulfillment_filter')]
    private ?SearchOrdersFulfillmentFilter $fulfillmentFilter;

    /**
     * @var ?SearchOrdersSourceFilter $sourceFilter Filter by the source of the order.
     */
    #[JsonProperty('source_filter')]
    private ?SearchOrdersSourceFilter $sourceFilter;

    /**
     * @var ?SearchOrdersCustomerFilter $customerFilter Filter by customers associated with the order.
     */
    #[JsonProperty('customer_filter')]
    private ?SearchOrdersCustomerFilter $customerFilter;

    /**
     * @param array{
     *   stateFilter?: ?SearchOrdersStateFilter,
     *   dateTimeFilter?: ?SearchOrdersDateTimeFilter,
     *   fulfillmentFilter?: ?SearchOrdersFulfillmentFilter,
     *   sourceFilter?: ?SearchOrdersSourceFilter,
     *   customerFilter?: ?SearchOrdersCustomerFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->stateFilter = $values['stateFilter'] ?? null;
        $this->dateTimeFilter = $values['dateTimeFilter'] ?? null;
        $this->fulfillmentFilter = $values['fulfillmentFilter'] ?? null;
        $this->sourceFilter = $values['sourceFilter'] ?? null;
        $this->customerFilter = $values['customerFilter'] ?? null;
    }

    /**
     * @return ?SearchOrdersStateFilter
     */
    public function getStateFilter(): ?SearchOrdersStateFilter
    {
        return $this->stateFilter;
    }

    /**
     * @param ?SearchOrdersStateFilter $value
     */
    public function setStateFilter(?SearchOrdersStateFilter $value = null): self
    {
        $this->stateFilter = $value;
        return $this;
    }

    /**
     * @return ?SearchOrdersDateTimeFilter
     */
    public function getDateTimeFilter(): ?SearchOrdersDateTimeFilter
    {
        return $this->dateTimeFilter;
    }

    /**
     * @param ?SearchOrdersDateTimeFilter $value
     */
    public function setDateTimeFilter(?SearchOrdersDateTimeFilter $value = null): self
    {
        $this->dateTimeFilter = $value;
        return $this;
    }

    /**
     * @return ?SearchOrdersFulfillmentFilter
     */
    public function getFulfillmentFilter(): ?SearchOrdersFulfillmentFilter
    {
        return $this->fulfillmentFilter;
    }

    /**
     * @param ?SearchOrdersFulfillmentFilter $value
     */
    public function setFulfillmentFilter(?SearchOrdersFulfillmentFilter $value = null): self
    {
        $this->fulfillmentFilter = $value;
        return $this;
    }

    /**
     * @return ?SearchOrdersSourceFilter
     */
    public function getSourceFilter(): ?SearchOrdersSourceFilter
    {
        return $this->sourceFilter;
    }

    /**
     * @param ?SearchOrdersSourceFilter $value
     */
    public function setSourceFilter(?SearchOrdersSourceFilter $value = null): self
    {
        $this->sourceFilter = $value;
        return $this;
    }

    /**
     * @return ?SearchOrdersCustomerFilter
     */
    public function getCustomerFilter(): ?SearchOrdersCustomerFilter
    {
        return $this->customerFilter;
    }

    /**
     * @param ?SearchOrdersCustomerFilter $value
     */
    public function setCustomerFilter(?SearchOrdersCustomerFilter $value = null): self
    {
        $this->customerFilter = $value;
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
