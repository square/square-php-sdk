<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Provides details about the reward tier discount. DEPRECATED at version 2020-12-16. Discount details
 * are now defined using a catalog pricing rule and other catalog objects. For more information, see
 * [Getting discount details for a reward tier](https://developer.squareup.com/docs/loyalty-api/loyalty-rewards#get-discount-details).
 */
class LoyaltyProgramRewardDefinition extends JsonSerializableType
{
    /**
     * Indicates the scope of the reward tier. DEPRECATED at version 2020-12-16. You can find this information in the
     * `product_set_data` field of the `PRODUCT_SET` catalog object referenced by the pricing rule. For `ORDER` scopes,
     * `all_products` is true. For `ITEM_VARIATION` or `CATEGORY` scopes, `product_ids_any` is a list of
     * catalog object IDs of the given type.
     * See [LoyaltyProgramRewardDefinitionScope](#type-loyaltyprogramrewarddefinitionscope) for possible values
     *
     * @var value-of<LoyaltyProgramRewardDefinitionScope> $scope
     */
    #[JsonProperty('scope')]
    private string $scope;

    /**
     * The type of discount the reward tier offers. DEPRECATED at version 2020-12-16. You can find this information
     * in the `discount_data.discount_type` field of the `DISCOUNT` catalog object referenced by the pricing rule.
     * See [LoyaltyProgramRewardDefinitionType](#type-loyaltyprogramrewarddefinitiontype) for possible values
     *
     * @var value-of<LoyaltyProgramRewardDefinitionType> $discountType
     */
    #[JsonProperty('discount_type')]
    private string $discountType;

    /**
     * The fixed percentage of the discount. Present if `discount_type` is `FIXED_PERCENTAGE`.
     * For example, a 7.25% off discount will be represented as "7.25". DEPRECATED at version 2020-12-16. You can find this
     * information in the `discount_data.percentage` field of the `DISCOUNT` catalog object referenced by the pricing rule.
     *
     * @var ?string $percentageDiscount
     */
    #[JsonProperty('percentage_discount')]
    private ?string $percentageDiscount;

    /**
     * The list of catalog objects to which this reward can be applied. They are either all item-variation ids or category ids, depending on the `type` field.
     * DEPRECATED at version 2020-12-16. You can find this information in the `product_set_data.product_ids_any` field
     * of the `PRODUCT_SET` catalog object referenced by the pricing rule.
     *
     * @var ?array<string> $catalogObjectIds
     */
    #[JsonProperty('catalog_object_ids'), ArrayType(['string'])]
    private ?array $catalogObjectIds;

    /**
     * The amount of the discount. Present if `discount_type` is `FIXED_AMOUNT`. For example, $5 off.
     * DEPRECATED at version 2020-12-16. You can find this information in the `discount_data.amount_money` field of the
     * `DISCOUNT` catalog object referenced by the pricing rule.
     *
     * @var ?Money $fixedDiscountMoney
     */
    #[JsonProperty('fixed_discount_money')]
    private ?Money $fixedDiscountMoney;

    /**
     * When `discount_type` is `FIXED_PERCENTAGE`, the maximum discount amount that can be applied.
     * DEPRECATED at version 2020-12-16. You can find this information in the `discount_data.maximum_amount_money` field
     * of the `DISCOUNT` catalog object referenced by the the pricing rule.
     *
     * @var ?Money $maxDiscountMoney
     */
    #[JsonProperty('max_discount_money')]
    private ?Money $maxDiscountMoney;

    /**
     * @param array{
     *   scope: value-of<LoyaltyProgramRewardDefinitionScope>,
     *   discountType: value-of<LoyaltyProgramRewardDefinitionType>,
     *   percentageDiscount?: ?string,
     *   catalogObjectIds?: ?array<string>,
     *   fixedDiscountMoney?: ?Money,
     *   maxDiscountMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->scope = $values['scope'];
        $this->discountType = $values['discountType'];
        $this->percentageDiscount = $values['percentageDiscount'] ?? null;
        $this->catalogObjectIds = $values['catalogObjectIds'] ?? null;
        $this->fixedDiscountMoney = $values['fixedDiscountMoney'] ?? null;
        $this->maxDiscountMoney = $values['maxDiscountMoney'] ?? null;
    }

    /**
     * @return value-of<LoyaltyProgramRewardDefinitionScope>
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param value-of<LoyaltyProgramRewardDefinitionScope> $value
     */
    public function setScope(string $value): self
    {
        $this->scope = $value;
        return $this;
    }

    /**
     * @return value-of<LoyaltyProgramRewardDefinitionType>
     */
    public function getDiscountType(): string
    {
        return $this->discountType;
    }

    /**
     * @param value-of<LoyaltyProgramRewardDefinitionType> $value
     */
    public function setDiscountType(string $value): self
    {
        $this->discountType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPercentageDiscount(): ?string
    {
        return $this->percentageDiscount;
    }

    /**
     * @param ?string $value
     */
    public function setPercentageDiscount(?string $value = null): self
    {
        $this->percentageDiscount = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getCatalogObjectIds(): ?array
    {
        return $this->catalogObjectIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCatalogObjectIds(?array $value = null): self
    {
        $this->catalogObjectIds = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getFixedDiscountMoney(): ?Money
    {
        return $this->fixedDiscountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setFixedDiscountMoney(?Money $value = null): self
    {
        $this->fixedDiscountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getMaxDiscountMoney(): ?Money
    {
        return $this->maxDiscountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setMaxDiscountMoney(?Money $value = null): self
    {
        $this->maxDiscountMoney = $value;
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
