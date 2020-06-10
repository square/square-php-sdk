<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a tax being returned that applies to one or more return line items in an order.
 *
 * Fixed-amount, order-scoped taxes are distributed across all non-zero return line item totals.
 * The amount distributed to each return line item is relative to that item’s contribution to the
 * order subtotal.
 */
class OrderReturnTax implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceTaxUid;

    /**
     * @var string|null
     */
    private $catalogObjectId;

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
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * Returns Uid.
     *
     * Unique ID that identifies the return tax only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID that identifies the return tax only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Tax Uid.
     *
     * `uid` of the Tax from the Order which contains the original charge of this tax.
     */
    public function getSourceTaxUid(): ?string
    {
        return $this->sourceTaxUid;
    }

    /**
     * Sets Source Tax Uid.
     *
     * `uid` of the Tax from the Order which contains the original charge of this tax.
     *
     * @maps source_tax_uid
     */
    public function setSourceTaxUid(?string $sourceTaxUid): void
    {
        $this->sourceTaxUid = $sourceTaxUid;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object id referencing [CatalogTax](#type-catalogtax).
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object id referencing [CatalogTax](#type-catalogtax).
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Name.
     *
     * The tax's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The tax's name.
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
     * Indicates how the tax is applied to the associated line item or order.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates how the tax is applied to the associated line item or order.
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
     * For example, a value of `"7.25"` corresponds to a percentage of 7.25%.
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * Sets Percentage.
     *
     * The percentage of the tax, as a string representation of a decimal number.
     * For example, a value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * @maps percentage
     */
    public function setPercentage(?string $percentage): void
    {
        $this->percentage = $percentage;
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
     * Indicates whether this is a line item or order level tax.
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * Sets Scope.
     *
     * Indicates whether this is a line item or order level tax.
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
        $json['uid']             = $this->uid;
        $json['source_tax_uid']  = $this->sourceTaxUid;
        $json['catalog_object_id'] = $this->catalogObjectId;
        $json['name']            = $this->name;
        $json['type']            = $this->type;
        $json['percentage']      = $this->percentage;
        $json['applied_money']   = $this->appliedMoney;
        $json['scope']           = $this->scope;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
