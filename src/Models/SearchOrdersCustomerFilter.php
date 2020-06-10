<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter based on Order `customer_id` and any Tender `customer_id`
 * associated with the Order. Does not filter based on the
 * [FulfillmentRecipient](#type-orderfulfillmentrecipient) `customer_id`.
 */
class SearchOrdersCustomerFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $customerIds;

    /**
     * Returns Customer Ids.
     *
     * List of customer IDs to filter by.
     *
     * Max: 10 customer IDs.
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
     * List of customer IDs to filter by.
     *
     * Max: 10 customer IDs.
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
        $json['customer_ids'] = $this->customerIds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
