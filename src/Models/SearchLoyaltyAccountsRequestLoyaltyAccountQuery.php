<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * The search criteria for the loyalty accounts.
 */
class SearchLoyaltyAccountsRequestLoyaltyAccountQuery implements \JsonSerializable
{
    /**
     * @var LoyaltyAccountMapping[]|null
     */
    private $mappings;

    /**
     * @var string[]|null
     */
    private $customerIds;

    /**
     * Returns Mappings.
     *
     * The set of mappings to use in the loyalty account search.
     *
     * This cannot be combined with `customer_ids`.
     *
     * Max: 30 mappings
     *
     * @return LoyaltyAccountMapping[]|null
     */
    public function getMappings(): ?array
    {
        return $this->mappings;
    }

    /**
     * Sets Mappings.
     *
     * The set of mappings to use in the loyalty account search.
     *
     * This cannot be combined with `customer_ids`.
     *
     * Max: 30 mappings
     *
     * @maps mappings
     *
     * @param LoyaltyAccountMapping[]|null $mappings
     */
    public function setMappings(?array $mappings): void
    {
        $this->mappings = $mappings;
    }

    /**
     * Returns Customer Ids.
     *
     * The set of customer IDs to use in the loyalty account search.
     *
     * This cannot be combined with `mappings`.
     *
     * Max: 30 customer IDs
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
     * The set of customer IDs to use in the loyalty account search.
     *
     * This cannot be combined with `mappings`.
     *
     * Max: 30 customer IDs
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
        if (isset($this->mappings)) {
            $json['mappings']     = $this->mappings;
        }
        if (isset($this->customerIds)) {
            $json['customer_ids'] = $this->customerIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
