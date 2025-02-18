<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Pricing options for an order. The options affect how the order's price is calculated.
 * They can be used, for example, to apply automatic price adjustments that are based on preconfigured
 * [pricing rules](entity:CatalogPricingRule).
 */
class OrderPricingOptions extends JsonSerializableType
{
    /**
     * The option to determine whether pricing rule-based
     * discounts are automatically applied to an order.
     *
     * @var ?bool $autoApplyDiscounts
     */
    #[JsonProperty('auto_apply_discounts')]
    private ?bool $autoApplyDiscounts;

    /**
     * The option to determine whether rule-based taxes are automatically
     * applied to an order when the criteria of the corresponding rules are met.
     *
     * @var ?bool $autoApplyTaxes
     */
    #[JsonProperty('auto_apply_taxes')]
    private ?bool $autoApplyTaxes;

    /**
     * @param array{
     *   autoApplyDiscounts?: ?bool,
     *   autoApplyTaxes?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autoApplyDiscounts = $values['autoApplyDiscounts'] ?? null;
        $this->autoApplyTaxes = $values['autoApplyTaxes'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getAutoApplyDiscounts(): ?bool
    {
        return $this->autoApplyDiscounts;
    }

    /**
     * @param ?bool $value
     */
    public function setAutoApplyDiscounts(?bool $value = null): self
    {
        $this->autoApplyDiscounts = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAutoApplyTaxes(): ?bool
    {
        return $this->autoApplyTaxes;
    }

    /**
     * @param ?bool $value
     */
    public function setAutoApplyTaxes(?bool $value = null): self
    {
        $this->autoApplyTaxes = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
