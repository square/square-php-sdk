<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes pricing adjustments that are blocked from manual and
 * automatic application to a line item. For more information, see
 * [Apply Taxes and Discounts](https://developer.squareup.com/docs/orders-api/apply-taxes-and-
 * discounts).
 */
class OrderLineItemPricingBlocklists implements \JsonSerializable
{
    /**
     * @var OrderLineItemPricingBlocklistsBlockedDiscount[]|null
     */
    private $blockedDiscounts;

    /**
     * @var OrderLineItemPricingBlocklistsBlockedTax[]|null
     */
    private $blockedTaxes;

    /**
     * Returns Blocked Discounts.
     *
     * A list of discounts blocked from applying to the line item.
     * Discounts can be blocked by the `discount_uid` (for ad hoc discounts) or
     * the `discount_catalog_object_id` (for catalog discounts).
     *
     * @return OrderLineItemPricingBlocklistsBlockedDiscount[]|null
     */
    public function getBlockedDiscounts(): ?array
    {
        return $this->blockedDiscounts;
    }

    /**
     * Sets Blocked Discounts.
     *
     * A list of discounts blocked from applying to the line item.
     * Discounts can be blocked by the `discount_uid` (for ad hoc discounts) or
     * the `discount_catalog_object_id` (for catalog discounts).
     *
     * @maps blocked_discounts
     *
     * @param OrderLineItemPricingBlocklistsBlockedDiscount[]|null $blockedDiscounts
     */
    public function setBlockedDiscounts(?array $blockedDiscounts): void
    {
        $this->blockedDiscounts = $blockedDiscounts;
    }

    /**
     * Returns Blocked Taxes.
     *
     * A list of taxes blocked from applying to the line item.
     * Taxes can be blocked by the `tax_uid` (for ad hoc taxes) or
     * the `tax_catalog_object_id` (for catalog taxes).
     *
     * @return OrderLineItemPricingBlocklistsBlockedTax[]|null
     */
    public function getBlockedTaxes(): ?array
    {
        return $this->blockedTaxes;
    }

    /**
     * Sets Blocked Taxes.
     *
     * A list of taxes blocked from applying to the line item.
     * Taxes can be blocked by the `tax_uid` (for ad hoc taxes) or
     * the `tax_catalog_object_id` (for catalog taxes).
     *
     * @maps blocked_taxes
     *
     * @param OrderLineItemPricingBlocklistsBlockedTax[]|null $blockedTaxes
     */
    public function setBlockedTaxes(?array $blockedTaxes): void
    {
        $this->blockedTaxes = $blockedTaxes;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->blockedDiscounts)) {
            $json['blocked_discounts'] = $this->blockedDiscounts;
        }
        if (isset($this->blockedTaxes)) {
            $json['blocked_taxes']     = $this->blockedTaxes;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
