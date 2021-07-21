<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes query filters to apply.
 */
class InvoiceFilter implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $locationIds;

    /**
     * @var string[]|null
     */
    private $customerIds;

    /**
     * @param string[] $locationIds
     */
    public function __construct(array $locationIds)
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Location Ids.
     *
     * Limits the search to the specified locations. A location is required.
     * In the current implementation, only one location can be specified.
     *
     * @return string[]
     */
    public function getLocationIds(): array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * Limits the search to the specified locations. A location is required.
     * In the current implementation, only one location can be specified.
     *
     * @required
     * @maps location_ids
     *
     * @param string[] $locationIds
     */
    public function setLocationIds(array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Customer Ids.
     *
     * Limits the search to the specified customers, within the specified locations.
     * Specifying a customer is optional. In the current implementation,
     * a maximum of one customer can be specified.
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
     * Limits the search to the specified customers, within the specified locations.
     * Specifying a customer is optional. In the current implementation,
     * a maximum of one customer can be specified.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_ids']     = $this->locationIds;
        if (isset($this->customerIds)) {
            $json['customer_ids'] = $this->customerIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
