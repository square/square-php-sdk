<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines an accrual rule, which is how buyers can earn points.
 */
class LoyaltyProgramAccrualRule implements \JsonSerializable
{
    /**
     * @var string
     */
    private $accrualType;

    /**
     * @var int|null
     */
    private $points;

    /**
     * @var Money|null
     */
    private $visitMinimumAmountMoney;

    /**
     * @var Money|null
     */
    private $spendAmountMoney;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string[]|null
     */
    private $excludedCategoryIds;

    /**
     * @var string[]|null
     */
    private $excludedItemVariationIds;

    /**
     * @param string $accrualType
     */
    public function __construct(string $accrualType)
    {
        $this->accrualType = $accrualType;
    }

    /**
     * Returns Accrual Type.
     *
     * The type of the accrual rule that defines how buyers can earn points.
     */
    public function getAccrualType(): string
    {
        return $this->accrualType;
    }

    /**
     * Sets Accrual Type.
     *
     * The type of the accrual rule that defines how buyers can earn points.
     *
     * @required
     * @maps accrual_type
     */
    public function setAccrualType(string $accrualType): void
    {
        $this->accrualType = $accrualType;
    }

    /**
     * Returns Points.
     *
     * The number of points that
     * buyers earn based on the `accrual_type`.
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of points that
     * buyers earn based on the `accrual_type`.
     *
     * @maps points
     */
    public function setPoints(?int $points): void
    {
        $this->points = $points;
    }

    /**
     * Returns Visit Minimum Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getVisitMinimumAmountMoney(): ?Money
    {
        return $this->visitMinimumAmountMoney;
    }

    /**
     * Sets Visit Minimum Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps visit_minimum_amount_money
     */
    public function setVisitMinimumAmountMoney(?Money $visitMinimumAmountMoney): void
    {
        $this->visitMinimumAmountMoney = $visitMinimumAmountMoney;
    }

    /**
     * Returns Spend Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getSpendAmountMoney(): ?Money
    {
        return $this->spendAmountMoney;
    }

    /**
     * Sets Spend Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps spend_amount_money
     */
    public function setSpendAmountMoney(?Money $spendAmountMoney): void
    {
        $this->spendAmountMoney = $spendAmountMoney;
    }

    /**
     * Returns Catalog Object Id.
     *
     * When the accrual rule is item-based or category-based, this field specifies the ID
     * of the [catalog object]($m/CatalogObject) that buyers can purchase to earn points.
     * If `accrual_type` is `ITEM_VARIATION`, the object is an item variation.
     * If `accrual_type` is `CATEGORY`, the object is a category.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * When the accrual rule is item-based or category-based, this field specifies the ID
     * of the [catalog object]($m/CatalogObject) that buyers can purchase to earn points.
     * If `accrual_type` is `ITEM_VARIATION`, the object is an item variation.
     * If `accrual_type` is `CATEGORY`, the object is a category.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Excluded Category Ids.
     *
     * When the accrual rule is spend-based (`accrual_type` is `SPEND`), this field
     * lists the IDs of any `CATEGORY` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects]($e/Catalog/BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded categories.
     *
     * @return string[]|null
     */
    public function getExcludedCategoryIds(): ?array
    {
        return $this->excludedCategoryIds;
    }

    /**
     * Sets Excluded Category Ids.
     *
     * When the accrual rule is spend-based (`accrual_type` is `SPEND`), this field
     * lists the IDs of any `CATEGORY` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects]($e/Catalog/BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded categories.
     *
     * @maps excluded_category_ids
     *
     * @param string[]|null $excludedCategoryIds
     */
    public function setExcludedCategoryIds(?array $excludedCategoryIds): void
    {
        $this->excludedCategoryIds = $excludedCategoryIds;
    }

    /**
     * Returns Excluded Item Variation Ids.
     *
     * When the accrual rule is spend-based (`accrual_type` is `SPEND`), this field
     * lists the IDs of any `ITEM_VARIATION` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects]($e/Catalog/BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded item variations.
     *
     * @return string[]|null
     */
    public function getExcludedItemVariationIds(): ?array
    {
        return $this->excludedItemVariationIds;
    }

    /**
     * Sets Excluded Item Variation Ids.
     *
     * When the accrual rule is spend-based (`accrual_type` is `SPEND`), this field
     * lists the IDs of any `ITEM_VARIATION` catalog objects that are excluded from points accrual.
     *
     * You can use the [BatchRetrieveCatalogObjects]($e/Catalog/BatchRetrieveCatalogObjects)
     * endpoint to retrieve information about the excluded item variations.
     *
     * @maps excluded_item_variation_ids
     *
     * @param string[]|null $excludedItemVariationIds
     */
    public function setExcludedItemVariationIds(?array $excludedItemVariationIds): void
    {
        $this->excludedItemVariationIds = $excludedItemVariationIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['accrual_type']                    = $this->accrualType;
        if (isset($this->points)) {
            $json['points']                      = $this->points;
        }
        if (isset($this->visitMinimumAmountMoney)) {
            $json['visit_minimum_amount_money']  = $this->visitMinimumAmountMoney;
        }
        if (isset($this->spendAmountMoney)) {
            $json['spend_amount_money']          = $this->spendAmountMoney;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']           = $this->catalogObjectId;
        }
        if (isset($this->excludedCategoryIds)) {
            $json['excluded_category_ids']       = $this->excludedCategoryIds;
        }
        if (isset($this->excludedItemVariationIds)) {
            $json['excluded_item_variation_ids'] = $this->excludedItemVariationIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
