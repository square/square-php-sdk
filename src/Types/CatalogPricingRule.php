<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines how discounts are automatically applied to a set of items that match the pricing rule
 * during the active time period.
 */
class CatalogPricingRule extends JsonSerializableType
{
    /**
     * User-defined name for the pricing rule. For example, "Buy one get one
     * free" or "10% off".
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * A list of unique IDs for the catalog time periods when
     * this pricing rule is in effect. If left unset, the pricing rule is always
     * in effect.
     *
     * @var ?array<string> $timePeriodIds
     */
    #[JsonProperty('time_period_ids'), ArrayType(['string'])]
    private ?array $timePeriodIds;

    /**
     * Unique ID for the `CatalogDiscount` to take off
     * the price of all matched items.
     *
     * @var ?string $discountId
     */
    #[JsonProperty('discount_id')]
    private ?string $discountId;

    /**
     * Unique ID for the `CatalogProductSet` that will be matched by this rule. A match rule
     * matches within the entire cart, and can match multiple times. This field will always be set.
     *
     * @var ?string $matchProductsId
     */
    #[JsonProperty('match_products_id')]
    private ?string $matchProductsId;

    /**
     * __Deprecated__: Please use the `exclude_products_id` field to apply
     * an exclude set instead. Exclude sets allow better control over quantity
     * ranges and offer more flexibility for which matched items receive a discount.
     *
     * `CatalogProductSet` to apply the pricing to.
     * An apply rule matches within the subset of the cart that fits the match rules (the match set).
     * An apply rule can only match once in the match set.
     * If not supplied, the pricing will be applied to all products in the match set.
     * Other products retain their base price, or a price generated by other rules.
     *
     * @var ?string $applyProductsId
     */
    #[JsonProperty('apply_products_id')]
    private ?string $applyProductsId;

    /**
     * `CatalogProductSet` to exclude from the pricing rule.
     * An exclude rule matches within the subset of the cart that fits the match rules (the match set).
     * An exclude rule can only match once in the match set.
     * If not supplied, the pricing will be applied to all products in the match set.
     * Other products retain their base price, or a price generated by other rules.
     *
     * @var ?string $excludeProductsId
     */
    #[JsonProperty('exclude_products_id')]
    private ?string $excludeProductsId;

    /**
     * @var ?string $validFromDate Represents the date the Pricing Rule is valid from. Represented in RFC 3339 full-date format (YYYY-MM-DD).
     */
    #[JsonProperty('valid_from_date')]
    private ?string $validFromDate;

    /**
     * Represents the local time the pricing rule should be valid from. Represented in RFC 3339 partial-time format
     * (HH:MM:SS). Partial seconds will be truncated.
     *
     * @var ?string $validFromLocalTime
     */
    #[JsonProperty('valid_from_local_time')]
    private ?string $validFromLocalTime;

    /**
     * @var ?string $validUntilDate Represents the date the Pricing Rule is valid until. Represented in RFC 3339 full-date format (YYYY-MM-DD).
     */
    #[JsonProperty('valid_until_date')]
    private ?string $validUntilDate;

    /**
     * Represents the local time the pricing rule should be valid until. Represented in RFC 3339 partial-time format
     * (HH:MM:SS). Partial seconds will be truncated.
     *
     * @var ?string $validUntilLocalTime
     */
    #[JsonProperty('valid_until_local_time')]
    private ?string $validUntilLocalTime;

    /**
     * If an `exclude_products_id` was given, controls which subset of matched
     * products is excluded from any discounts.
     *
     * Default value: `LEAST_EXPENSIVE`
     * See [ExcludeStrategy](#type-excludestrategy) for possible values
     *
     * @var ?value-of<ExcludeStrategy> $excludeStrategy
     */
    #[JsonProperty('exclude_strategy')]
    private ?string $excludeStrategy;

    /**
     * The minimum order subtotal (before discounts or taxes are applied)
     * that must be met before this rule may be applied.
     *
     * @var ?Money $minimumOrderSubtotalMoney
     */
    #[JsonProperty('minimum_order_subtotal_money')]
    private ?Money $minimumOrderSubtotalMoney;

    /**
     * A list of IDs of customer groups, the members of which are eligible for discounts specified in this pricing rule.
     * Notice that a group ID is generated by the Customers API.
     * If this field is not set, the specified discount applies to matched products sold to anyone whether the buyer
     * has a customer profile created or not. If this `customer_group_ids_any` field is set, the specified discount
     * applies only to matched products sold to customers belonging to the specified customer groups.
     *
     * @var ?array<string> $customerGroupIdsAny
     */
    #[JsonProperty('customer_group_ids_any'), ArrayType(['string'])]
    private ?array $customerGroupIdsAny;

    /**
     * @param array{
     *   name?: ?string,
     *   timePeriodIds?: ?array<string>,
     *   discountId?: ?string,
     *   matchProductsId?: ?string,
     *   applyProductsId?: ?string,
     *   excludeProductsId?: ?string,
     *   validFromDate?: ?string,
     *   validFromLocalTime?: ?string,
     *   validUntilDate?: ?string,
     *   validUntilLocalTime?: ?string,
     *   excludeStrategy?: ?value-of<ExcludeStrategy>,
     *   minimumOrderSubtotalMoney?: ?Money,
     *   customerGroupIdsAny?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->timePeriodIds = $values['timePeriodIds'] ?? null;
        $this->discountId = $values['discountId'] ?? null;
        $this->matchProductsId = $values['matchProductsId'] ?? null;
        $this->applyProductsId = $values['applyProductsId'] ?? null;
        $this->excludeProductsId = $values['excludeProductsId'] ?? null;
        $this->validFromDate = $values['validFromDate'] ?? null;
        $this->validFromLocalTime = $values['validFromLocalTime'] ?? null;
        $this->validUntilDate = $values['validUntilDate'] ?? null;
        $this->validUntilLocalTime = $values['validUntilLocalTime'] ?? null;
        $this->excludeStrategy = $values['excludeStrategy'] ?? null;
        $this->minimumOrderSubtotalMoney = $values['minimumOrderSubtotalMoney'] ?? null;
        $this->customerGroupIdsAny = $values['customerGroupIdsAny'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTimePeriodIds(): ?array
    {
        return $this->timePeriodIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTimePeriodIds(?array $value = null): self
    {
        $this->timePeriodIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDiscountId(): ?string
    {
        return $this->discountId;
    }

    /**
     * @param ?string $value
     */
    public function setDiscountId(?string $value = null): self
    {
        $this->discountId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMatchProductsId(): ?string
    {
        return $this->matchProductsId;
    }

    /**
     * @param ?string $value
     */
    public function setMatchProductsId(?string $value = null): self
    {
        $this->matchProductsId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getApplyProductsId(): ?string
    {
        return $this->applyProductsId;
    }

    /**
     * @param ?string $value
     */
    public function setApplyProductsId(?string $value = null): self
    {
        $this->applyProductsId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getExcludeProductsId(): ?string
    {
        return $this->excludeProductsId;
    }

    /**
     * @param ?string $value
     */
    public function setExcludeProductsId(?string $value = null): self
    {
        $this->excludeProductsId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValidFromDate(): ?string
    {
        return $this->validFromDate;
    }

    /**
     * @param ?string $value
     */
    public function setValidFromDate(?string $value = null): self
    {
        $this->validFromDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValidFromLocalTime(): ?string
    {
        return $this->validFromLocalTime;
    }

    /**
     * @param ?string $value
     */
    public function setValidFromLocalTime(?string $value = null): self
    {
        $this->validFromLocalTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValidUntilDate(): ?string
    {
        return $this->validUntilDate;
    }

    /**
     * @param ?string $value
     */
    public function setValidUntilDate(?string $value = null): self
    {
        $this->validUntilDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValidUntilLocalTime(): ?string
    {
        return $this->validUntilLocalTime;
    }

    /**
     * @param ?string $value
     */
    public function setValidUntilLocalTime(?string $value = null): self
    {
        $this->validUntilLocalTime = $value;
        return $this;
    }

    /**
     * @return ?value-of<ExcludeStrategy>
     */
    public function getExcludeStrategy(): ?string
    {
        return $this->excludeStrategy;
    }

    /**
     * @param ?value-of<ExcludeStrategy> $value
     */
    public function setExcludeStrategy(?string $value = null): self
    {
        $this->excludeStrategy = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getMinimumOrderSubtotalMoney(): ?Money
    {
        return $this->minimumOrderSubtotalMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setMinimumOrderSubtotalMoney(?Money $value = null): self
    {
        $this->minimumOrderSubtotalMoney = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getCustomerGroupIdsAny(): ?array
    {
        return $this->customerGroupIdsAny;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCustomerGroupIdsAny(?array $value = null): self
    {
        $this->customerGroupIdsAny = $value;
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
