<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * A filter based on the order `customer_id` and any tender `customer_id`
 * associated with the order. It does not filter based on the
 * [FulfillmentRecipient]($m/OrderFulfillmentRecipient) `customer_id`.
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
     * A list of customer IDs to filter by.
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
     * A list of customer IDs to filter by.
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
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
