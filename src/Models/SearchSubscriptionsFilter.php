<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a set of query expressions (filters) to narrow the scope of targeted subscriptions
 * returned by
 * the [SearchSubscriptions]($e/Subscriptions/SearchSubscriptions) endpoint.
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
     * @var string[]|null
     */
    private $sourceNames;

    /**
     * Returns Customer Ids.
     *
     * A filter to select subscriptions based on the subscribing customer IDs.
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
     * A filter to select subscriptions based on the subscribing customer IDs.
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
     * A filter to select subscriptions based on the location.
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
     * A filter to select subscriptions based on the location.
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
     * Returns Source Names.
     *
     * A filter to select subscriptions based on the source application.
     *
     * @return string[]|null
     */
    public function getSourceNames(): ?array
    {
        return $this->sourceNames;
    }

    /**
     * Sets Source Names.
     *
     * A filter to select subscriptions based on the source application.
     *
     * @maps source_names
     *
     * @param string[]|null $sourceNames
     */
    public function setSourceNames(?array $sourceNames): void
    {
        $this->sourceNames = $sourceNames;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->customerIds)) {
            $json['customer_ids'] = $this->customerIds;
        }
        if (isset($this->locationIds)) {
            $json['location_ids'] = $this->locationIds;
        }
        if (isset($this->sourceNames)) {
            $json['source_names'] = $this->sourceNames;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
