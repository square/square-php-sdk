<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes pricing adjustments that are blocked from automatic
 * application to a line item. For more information, see
 * [Apply Taxes and Discounts](https://developer.squareup.com/docs/orders-api/apply-taxes-and-discounts).
 */
class OrderLineItemPricingBlocklists extends JsonSerializableType
{
    /**
     * A list of discounts blocked from applying to the line item.
     * Discounts can be blocked by the `discount_uid` (for ad hoc discounts) or
     * the `discount_catalog_object_id` (for catalog discounts).
     *
     * @var ?array<OrderLineItemPricingBlocklistsBlockedDiscount> $blockedDiscounts
     */
    #[JsonProperty('blocked_discounts'), ArrayType([OrderLineItemPricingBlocklistsBlockedDiscount::class])]
    private ?array $blockedDiscounts;

    /**
     * A list of taxes blocked from applying to the line item.
     * Taxes can be blocked by the `tax_uid` (for ad hoc taxes) or
     * the `tax_catalog_object_id` (for catalog taxes).
     *
     * @var ?array<OrderLineItemPricingBlocklistsBlockedTax> $blockedTaxes
     */
    #[JsonProperty('blocked_taxes'), ArrayType([OrderLineItemPricingBlocklistsBlockedTax::class])]
    private ?array $blockedTaxes;

    /**
     * A list of service charges blocked from applying to the line item.
     * Service charges can be blocked by the `service_charge_uid` (for ad hoc
     * service charges) or the `service_charge_catalog_object_id` (for catalog
     * service charges).
     *
     * @var ?array<OrderLineItemPricingBlocklistsBlockedServiceCharge> $blockedServiceCharges
     */
    #[JsonProperty('blocked_service_charges'), ArrayType([OrderLineItemPricingBlocklistsBlockedServiceCharge::class])]
    private ?array $blockedServiceCharges;

    /**
     * @param array{
     *   blockedDiscounts?: ?array<OrderLineItemPricingBlocklistsBlockedDiscount>,
     *   blockedTaxes?: ?array<OrderLineItemPricingBlocklistsBlockedTax>,
     *   blockedServiceCharges?: ?array<OrderLineItemPricingBlocklistsBlockedServiceCharge>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->blockedDiscounts = $values['blockedDiscounts'] ?? null;
        $this->blockedTaxes = $values['blockedTaxes'] ?? null;
        $this->blockedServiceCharges = $values['blockedServiceCharges'] ?? null;
    }

    /**
     * @return ?array<OrderLineItemPricingBlocklistsBlockedDiscount>
     */
    public function getBlockedDiscounts(): ?array
    {
        return $this->blockedDiscounts;
    }

    /**
     * @param ?array<OrderLineItemPricingBlocklistsBlockedDiscount> $value
     */
    public function setBlockedDiscounts(?array $value = null): self
    {
        $this->blockedDiscounts = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemPricingBlocklistsBlockedTax>
     */
    public function getBlockedTaxes(): ?array
    {
        return $this->blockedTaxes;
    }

    /**
     * @param ?array<OrderLineItemPricingBlocklistsBlockedTax> $value
     */
    public function setBlockedTaxes(?array $value = null): self
    {
        $this->blockedTaxes = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemPricingBlocklistsBlockedServiceCharge>
     */
    public function getBlockedServiceCharges(): ?array
    {
        return $this->blockedServiceCharges;
    }

    /**
     * @param ?array<OrderLineItemPricingBlocklistsBlockedServiceCharge> $value
     */
    public function setBlockedServiceCharges(?array $value = null): self
    {
        $this->blockedServiceCharges = $value;
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
