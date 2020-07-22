<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Pricing options for an order. The options affect how the order's price is calculated.
 * They can be used, for example, to apply automatic price adjustments that are based on pre-
 * configured
 * [pricing rules](https://developer.squareup.com/docs/reference/square/objects/CatalogPricingRule).
 */
class OrderPricingOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $autoApplyDiscounts;

    /**
     * Returns Auto Apply Discounts.
     *
     * The option to determine whether or not pricing rule-based discounts are automatically applied to an
     * order.
     */
    public function getAutoApplyDiscounts(): ?bool
    {
        return $this->autoApplyDiscounts;
    }

    /**
     * Sets Auto Apply Discounts.
     *
     * The option to determine whether or not pricing rule-based discounts are automatically applied to an
     * order.
     *
     * @maps auto_apply_discounts
     */
    public function setAutoApplyDiscounts(?bool $autoApplyDiscounts): void
    {
        $this->autoApplyDiscounts = $autoApplyDiscounts;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['auto_apply_discounts'] = $this->autoApplyDiscounts;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
