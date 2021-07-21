<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a set of SearchSubscriptionsQuery filters used to limit the set of Subscriptions
 * returned by SearchSubscriptions.
 */
class SearchSubscriptionsFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $customerIds;

    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * Returns Customer Ids.
     *
     * A filter to select subscriptions based on the customer.
     *
     * @return string[]|null
     */
    public function getCustomerIds(): ?array
    {
        return $this->customerIds;
    }

    /**
     * Sets Customer Ids.
     *
     * A filter to select subscriptions based on the customer.
     *
     * @maps customer_ids
     *
     * @param string[]|null $customerIds
     */
    public function setCustomerIds(?array $customerIds): void
    {
        $this->customerIds = $customerIds;
    }

    /**
     * Returns Location Ids.
     *
     * A filter to select subscriptions based the location.
     *
     * @return string[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * A filter to select subscriptions based the location.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(?array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->customerIds)) {
            $json['customer_ids'] = $this->customerIds;
        }
        if (isset($this->locationIds)) {
            $json['location_ids'] = $this->locationIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
