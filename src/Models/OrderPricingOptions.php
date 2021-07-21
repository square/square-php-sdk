<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Pricing options for an order. The options affect how the order's price is calculated.
 * They can be used, for example, to apply automatic price adjustments that are based on preconfigured
 * [pricing rules]($m/CatalogPricingRule).
 */
class OrderPricingOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $autoApplyDiscounts;

    /**
     * @var bool|null
     */
    private $autoApplyTaxes;

    /**
     * Returns Auto Apply Discounts.
     *
     * The option to determine whether pricing rule-based
     * discounts are automatically applied to an order.
     */
    public function getAutoApplyDiscounts(): ?bool
    {
        return $this->autoApplyDiscounts;
    }

    /**
     * Sets Auto Apply Discounts.
     *
     * The option to determine whether pricing rule-based
     * discounts are automatically applied to an order.
     *
     * @maps auto_apply_discounts
     */
    public function setAutoApplyDiscounts(?bool $autoApplyDiscounts): void
    {
        $this->autoApplyDiscounts = $autoApplyDiscounts;
    }

    /**
     * Returns Auto Apply Taxes.
     *
     * The option to determine whether rule-based taxes are automatically
     * applied to an order when the criteria of the corresponding rules are met.
     */
    public function getAutoApplyTaxes(): ?bool
    {
        return $this->autoApplyTaxes;
    }

    /**
     * Sets Auto Apply Taxes.
     *
     * The option to determine whether rule-based taxes are automatically
     * applied to an order when the criteria of the corresponding rules are met.
     *
     * @maps auto_apply_taxes
     */
    public function setAutoApplyTaxes(?bool $autoApplyTaxes): void
    {
        $this->autoApplyTaxes = $autoApplyTaxes;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->autoApplyDiscounts)) {
            $json['auto_apply_discounts'] = $this->autoApplyDiscounts;
        }
        if (isset($this->autoApplyTaxes)) {
            $json['auto_apply_taxes']     = $this->autoApplyTaxes;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
