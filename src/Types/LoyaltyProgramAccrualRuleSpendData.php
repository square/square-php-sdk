<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents additional data for rules with the `SPEND` accrual type.
 */
class LoyaltyProgramAccrualRuleSpendData extends JsonSerializableType
{
    /**
     * The amount that buyers must spend to earn points.
     * For example, given an "Earn 1 point for every $10 spent" accrual rule, a buyer who spends $105 earns 10 points.
     *
     * @var Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * The IDs of any `CATEGORY` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects](api-endpoint:Catalog-BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded categories.
     *
     * @var ?array<string> $excludedCategoryIds
     */
    #[JsonProperty('excluded_category_ids'), ArrayType(['string'])]
    private ?array $excludedCategoryIds;

    /**
     * The IDs of any `ITEM_VARIATION` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects](api-endpoint:Catalog-BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded item variations.
     *
     * @var ?array<string> $excludedItemVariationIds
     */
    #[JsonProperty('excluded_item_variation_ids'), ArrayType(['string'])]
    private ?array $excludedItemVariationIds;

    /**
     * Indicates how taxes should be treated when calculating the purchase amount used for points accrual.
     * See [LoyaltyProgramAccrualRuleTaxMode](#type-loyaltyprogramaccrualruletaxmode) for possible values
     *
     * @var value-of<LoyaltyProgramAccrualRuleTaxMode> $taxMode
     */
    #[JsonProperty('tax_mode')]
    private string $taxMode;

    /**
     * @param array{
     *   amountMoney: Money,
     *   taxMode: value-of<LoyaltyProgramAccrualRuleTaxMode>,
     *   excludedCategoryIds?: ?array<string>,
     *   excludedItemVariationIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMoney = $values['amountMoney'];
        $this->excludedCategoryIds = $values['excludedCategoryIds'] ?? null;
        $this->excludedItemVariationIds = $values['excludedItemVariationIds'] ?? null;
        $this->taxMode = $values['taxMode'];
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getExcludedCategoryIds(): ?array
    {
        return $this->excludedCategoryIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setExcludedCategoryIds(?array $value = null): self
    {
        $this->excludedCategoryIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getExcludedItemVariationIds(): ?array
    {
        return $this->excludedItemVariationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setExcludedItemVariationIds(?array $value = null): self
    {
        $this->excludedItemVariationIds = $value;
        return $this;
    }

    /**
     * @return value-of<LoyaltyProgramAccrualRuleTaxMode>
     */
    public function getTaxMode(): string
    {
        return $this->taxMode;
    }

    /**
     * @param value-of<LoyaltyProgramAccrualRuleTaxMode> $value
     */
    public function setTaxMode(string $value): self
    {
        $this->taxMode = $value;
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
