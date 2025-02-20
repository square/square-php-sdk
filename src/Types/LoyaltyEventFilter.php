<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The filtering criteria. If the request specifies multiple filters,
 * the endpoint uses a logical AND to evaluate them.
 */
class LoyaltyEventFilter extends JsonSerializableType
{
    /**
     * @var ?LoyaltyEventLoyaltyAccountFilter $loyaltyAccountFilter Filter events by loyalty account.
     */
    #[JsonProperty('loyalty_account_filter')]
    private ?LoyaltyEventLoyaltyAccountFilter $loyaltyAccountFilter;

    /**
     * @var ?LoyaltyEventTypeFilter $typeFilter Filter events by event type.
     */
    #[JsonProperty('type_filter')]
    private ?LoyaltyEventTypeFilter $typeFilter;

    /**
     * Filter events by date time range.
     * For each range, the start time is inclusive and the end time
     * is exclusive.
     *
     * @var ?LoyaltyEventDateTimeFilter $dateTimeFilter
     */
    #[JsonProperty('date_time_filter')]
    private ?LoyaltyEventDateTimeFilter $dateTimeFilter;

    /**
     * @var ?LoyaltyEventLocationFilter $locationFilter Filter events by location.
     */
    #[JsonProperty('location_filter')]
    private ?LoyaltyEventLocationFilter $locationFilter;

    /**
     * @var ?LoyaltyEventOrderFilter $orderFilter Filter events by the order associated with the event.
     */
    #[JsonProperty('order_filter')]
    private ?LoyaltyEventOrderFilter $orderFilter;

    /**
     * @param array{
     *   loyaltyAccountFilter?: ?LoyaltyEventLoyaltyAccountFilter,
     *   typeFilter?: ?LoyaltyEventTypeFilter,
     *   dateTimeFilter?: ?LoyaltyEventDateTimeFilter,
     *   locationFilter?: ?LoyaltyEventLocationFilter,
     *   orderFilter?: ?LoyaltyEventOrderFilter,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyAccountFilter = $values['loyaltyAccountFilter'] ?? null;
        $this->typeFilter = $values['typeFilter'] ?? null;
        $this->dateTimeFilter = $values['dateTimeFilter'] ?? null;
        $this->locationFilter = $values['locationFilter'] ?? null;
        $this->orderFilter = $values['orderFilter'] ?? null;
    }

    /**
     * @return ?LoyaltyEventLoyaltyAccountFilter
     */
    public function getLoyaltyAccountFilter(): ?LoyaltyEventLoyaltyAccountFilter
    {
        return $this->loyaltyAccountFilter;
    }

    /**
     * @param ?LoyaltyEventLoyaltyAccountFilter $value
     */
    public function setLoyaltyAccountFilter(?LoyaltyEventLoyaltyAccountFilter $value = null): self
    {
        $this->loyaltyAccountFilter = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventTypeFilter
     */
    public function getTypeFilter(): ?LoyaltyEventTypeFilter
    {
        return $this->typeFilter;
    }

    /**
     * @param ?LoyaltyEventTypeFilter $value
     */
    public function setTypeFilter(?LoyaltyEventTypeFilter $value = null): self
    {
        $this->typeFilter = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventDateTimeFilter
     */
    public function getDateTimeFilter(): ?LoyaltyEventDateTimeFilter
    {
        return $this->dateTimeFilter;
    }

    /**
     * @param ?LoyaltyEventDateTimeFilter $value
     */
    public function setDateTimeFilter(?LoyaltyEventDateTimeFilter $value = null): self
    {
        $this->dateTimeFilter = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventLocationFilter
     */
    public function getLocationFilter(): ?LoyaltyEventLocationFilter
    {
        return $this->locationFilter;
    }

    /**
     * @param ?LoyaltyEventLocationFilter $value
     */
    public function setLocationFilter(?LoyaltyEventLocationFilter $value = null): self
    {
        $this->locationFilter = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventOrderFilter
     */
    public function getOrderFilter(): ?LoyaltyEventOrderFilter
    {
        return $this->orderFilter;
    }

    /**
     * @param ?LoyaltyEventOrderFilter $value
     */
    public function setOrderFilter(?LoyaltyEventOrderFilter $value = null): self
    {
        $this->orderFilter = $value;
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
