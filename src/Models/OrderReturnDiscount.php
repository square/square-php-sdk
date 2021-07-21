<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a discount being returned that applies to one or more return line items in an
 * order.
 *
 * Fixed-amount, order-scoped discounts are distributed across all non-zero return line item totals.
 * The amount distributed to each return line item is relative to that item’s contribution to the
 * order subtotal.
 */
class OrderReturnDiscount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceDiscountUid;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var int|null
     */
    private $catalogVersion;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $percentage;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * Returns Uid.
     *
     * A unique ID that identifies the returned discount only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID that identifies the returned discount only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Discount Uid.
     *
     * The discount `uid` from the order that contains the original application of this discount.
     */
    public function getSourceDiscountUid(): ?string
    {
        return $this->sourceDiscountUid;
    }

    /**
     * Sets Source Discount Uid.
     *
     * The discount `uid` from the order that contains the original application of this discount.
     *
     * @maps source_discount_uid
     */
    public function setSourceDiscountUid(?string $sourceDiscountUid): void
    {
        $this->sourceDiscountUid = $sourceDiscountUid;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogDiscount]($m/CatalogDiscount).
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogDiscount]($m/CatalogDiscount).
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Version.
     *
     * The version of the catalog object that this discount references.
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The version of the catalog object that this discount references.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion(?int $catalogVersion): void
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Returns Name.
     *
     * The discount's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The discount's name.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Type.
     *
     * Indicates how the discount is applied to the associated line item or order.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates how the discount is applied to the associated line item or order.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Percentage.
     *
     * The percentage of the tax, as a string representation of a decimal number.
     * A value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * `percentage` is not set for amount-based discounts.
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * Sets Percentage.
     *
     * The percentage of the tax, as a string representation of a decimal number.
     * A value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * `percentage` is not set for amount-based discounts.
     *
     * @maps percentage
     */
    public function setPercentage(?string $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppliedMoney(): ?Money
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(?Money $appliedMoney): void
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Scope.
     *
     * Indicates whether this is a line-item or order-level discount.
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * Sets Scope.
     *
     * Indicates whether this is a line-item or order-level discount.
     *
     * @maps scope
     */
    public function setScope(?string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid']                 = $this->uid;
        }
        if (isset($this->sourceDiscountUid)) {
            $json['source_discount_uid'] = $this->sourceDiscountUid;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']   = $this->catalogObjectId;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']     = $this->catalogVersion;
        }
        if (isset($this->name)) {
            $json['name']                = $this->name;
        }
        if (isset($this->type)) {
            $json['type']                = $this->type;
        }
        if (isset($this->percentage)) {
            $json['percentage']          = $this->percentage;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']        = $this->amountMoney;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money']       = $this->appliedMoney;
        }
        if (isset($this->scope)) {
            $json['scope']               = $this->scope;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
