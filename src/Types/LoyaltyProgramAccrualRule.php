<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an accrual rule, which defines how buyers can earn points from the base [loyalty program](entity:LoyaltyProgram).
 */
class LoyaltyProgramAccrualRule extends JsonSerializableType
{
    /**
     * The type of the accrual rule that defines how buyers can earn points.
     * See [LoyaltyProgramAccrualRuleType](#type-loyaltyprogramaccrualruletype) for possible values
     *
     * @var value-of<LoyaltyProgramAccrualRuleType> $accrualType
     */
    #[JsonProperty('accrual_type')]
    private string $accrualType;

    /**
     * The number of points that
     * buyers earn based on the `accrual_type`.
     *
     * @var ?int $points
     */
    #[JsonProperty('points')]
    private ?int $points;

    /**
     * @var ?LoyaltyProgramAccrualRuleVisitData $visitData Additional data for rules with the `VISIT` accrual type.
     */
    #[JsonProperty('visit_data')]
    private ?LoyaltyProgramAccrualRuleVisitData $visitData;

    /**
     * @var ?LoyaltyProgramAccrualRuleSpendData $spendData Additional data for rules with the `SPEND` accrual type.
     */
    #[JsonProperty('spend_data')]
    private ?LoyaltyProgramAccrualRuleSpendData $spendData;

    /**
     * @var ?LoyaltyProgramAccrualRuleItemVariationData $itemVariationData Additional data for rules with the `ITEM_VARIATION` accrual type.
     */
    #[JsonProperty('item_variation_data')]
    private ?LoyaltyProgramAccrualRuleItemVariationData $itemVariationData;

    /**
     * @var ?LoyaltyProgramAccrualRuleCategoryData $categoryData Additional data for rules with the `CATEGORY` accrual type.
     */
    #[JsonProperty('category_data')]
    private ?LoyaltyProgramAccrualRuleCategoryData $categoryData;

    /**
     * @param array{
     *   accrualType: value-of<LoyaltyProgramAccrualRuleType>,
     *   points?: ?int,
     *   visitData?: ?LoyaltyProgramAccrualRuleVisitData,
     *   spendData?: ?LoyaltyProgramAccrualRuleSpendData,
     *   itemVariationData?: ?LoyaltyProgramAccrualRuleItemVariationData,
     *   categoryData?: ?LoyaltyProgramAccrualRuleCategoryData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accrualType = $values['accrualType'];
        $this->points = $values['points'] ?? null;
        $this->visitData = $values['visitData'] ?? null;
        $this->spendData = $values['spendData'] ?? null;
        $this->itemVariationData = $values['itemVariationData'] ?? null;
        $this->categoryData = $values['categoryData'] ?? null;
    }

    /**
     * @return value-of<LoyaltyProgramAccrualRuleType>
     */
    public function getAccrualType(): string
    {
        return $this->accrualType;
    }

    /**
     * @param value-of<LoyaltyProgramAccrualRuleType> $value
     */
    public function setAccrualType(string $value): self
    {
        $this->accrualType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param ?int $value
     */
    public function setPoints(?int $value = null): self
    {
        $this->points = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramAccrualRuleVisitData
     */
    public function getVisitData(): ?LoyaltyProgramAccrualRuleVisitData
    {
        return $this->visitData;
    }

    /**
     * @param ?LoyaltyProgramAccrualRuleVisitData $value
     */
    public function setVisitData(?LoyaltyProgramAccrualRuleVisitData $value = null): self
    {
        $this->visitData = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramAccrualRuleSpendData
     */
    public function getSpendData(): ?LoyaltyProgramAccrualRuleSpendData
    {
        return $this->spendData;
    }

    /**
     * @param ?LoyaltyProgramAccrualRuleSpendData $value
     */
    public function setSpendData(?LoyaltyProgramAccrualRuleSpendData $value = null): self
    {
        $this->spendData = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramAccrualRuleItemVariationData
     */
    public function getItemVariationData(): ?LoyaltyProgramAccrualRuleItemVariationData
    {
        return $this->itemVariationData;
    }

    /**
     * @param ?LoyaltyProgramAccrualRuleItemVariationData $value
     */
    public function setItemVariationData(?LoyaltyProgramAccrualRuleItemVariationData $value = null): self
    {
        $this->itemVariationData = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramAccrualRuleCategoryData
     */
    public function getCategoryData(): ?LoyaltyProgramAccrualRuleCategoryData
    {
        return $this->categoryData;
    }

    /**
     * @param ?LoyaltyProgramAccrualRuleCategoryData $value
     */
    public function setCategoryData(?LoyaltyProgramAccrualRuleCategoryData $value = null): self
    {
        $this->categoryData = $value;
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
