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
     * The ID of the [catalog object](#type-CatalogObject) to purchase to earn the number of points defined
     * by the
     * rule. This is either an item variation or a category, depending on the type. This is defined on
     * `ITEM_VARIATION` rules and `CATEGORY` rules.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The ID of the [catalog object](#type-CatalogObject) to purchase to earn the number of points defined
     * by the
     * rule. This is either an item variation or a category, depending on the type. This is defined on
     * `ITEM_VARIATION` rules and `CATEGORY` rules.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['accrual_type']            = $this->accrualType;
        $json['points']                  = $this->points;
        $json['visit_minimum_amount_money'] = $this->visitMinimumAmountMoney;
        $json['spend_amount_money']      = $this->spendAmountMoney;
        $json['catalog_object_id']       = $this->catalogObjectId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
