<?php

declare(strict_types=1);

namespace Square\Models;

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
     * Returns Mappings.
     *
     * The set of mappings to use in the loyalty account search.
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
     * @maps mappings
     *
     * @param LoyaltyAccountMapping[]|null $mappings
     */
    public function setMappings(?array $mappings): void
    {
        $this->mappings = $mappings;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['mappings'] = $this->mappings;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
