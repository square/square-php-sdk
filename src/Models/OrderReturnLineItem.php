<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The line item being returned in an Order.
 */
class OrderReturnLineItem implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceLineItemUid;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var OrderQuantityUnit|null
     */
    private $quantityUnit;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $variationName;

    /**
     * @var OrderReturnLineItemModifier[]|null
     */
    private $returnModifiers;

    /**
     * @var OrderLineItemAppliedTax[]|null
     */
    private $appliedTaxes;

    /**
     * @var OrderLineItemAppliedDiscount[]|null
     */
    private $appliedDiscounts;

    /**
     * @var Money|null
     */
    private $basePriceMoney;

    /**
     * @var Money|null
     */
    private $variationTotalPriceMoney;

    /**
     * @var Money|null
     */
    private $grossReturnMoney;

    /**
     * @var Money|null
     */
    private $totalTaxMoney;

    /**
     * @var Money|null
     */
    private $totalDiscountMoney;

    /**
     * @var Money|null
     */
    private $totalMoney;

    /**
     * @param string $quantity
     */
    public function __construct(string $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Uid.
     *
     * Unique identifier for this return line item entry.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique identifier for this return line item entry.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Line Item Uid.
     *
     * `uid` of the LineItem in the original sale Order.
     */
    public function getSourceLineItemUid(): ?string
    {
        return $this->sourceLineItemUid;
    }

    /**
     * Sets Source Line Item Uid.
     *
     * `uid` of the LineItem in the original sale Order.
     *
     * @maps source_line_item_uid
     */
    public function setSourceLineItemUid(?string $sourceLineItemUid): void
    {
        $this->sourceLineItemUid = $sourceLineItemUid;
    }

    /**
     * Returns Name.
     *
     * The name of the line item.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the line item.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Quantity.
     *
     * The quantity returned, formatted as a decimal number.
     * For example: `"3"`.
     *
     * Line items with a `quantity_unit` can have non-integer quantities.
     * For example: `"1.70000"`.
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The quantity returned, formatted as a decimal number.
     * For example: `"3"`.
     *
     * Line items with a `quantity_unit` can have non-integer quantities.
     * For example: `"1.70000"`.
     *
     * @required
     * @maps quantity
     */
    public function setQuantity(string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Quantity Unit.
     *
     * Contains the measurement unit for a quantity and a precision which
     * specifies the number of digits after the decimal point for decimal quantities.
     */
    public function getQuantityUnit(): ?OrderQuantityUnit
    {
        return $this->quantityUnit;
    }

    /**
     * Sets Quantity Unit.
     *
     * Contains the measurement unit for a quantity and a precision which
     * specifies the number of digits after the decimal point for decimal quantities.
     *
     * @maps quantity_unit
     */
    public function setQuantityUnit(?OrderQuantityUnit $quantityUnit): void
    {
        $this->quantityUnit = $quantityUnit;
    }

    /**
     * Returns Note.
     *
     * The note of the returned line item.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * The note of the returned line item.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The [CatalogItemVariation](#type-catalogitemvariation) id applied to this returned line item.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The [CatalogItemVariation](#type-catalogitemvariation) id applied to this returned line item.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Variation Name.
     *
     * The name of the variation applied to this returned line item.
     */
    public function getVariationName(): ?string
    {
        return $this->variationName;
    }

    /**
     * Sets Variation Name.
     *
     * The name of the variation applied to this returned line item.
     *
     * @maps variation_name
     */
    public function setVariationName(?string $variationName): void
    {
        $this->variationName = $variationName;
    }

    /**
     * Returns Return Modifiers.
     *
     * The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
     *
     * @return OrderReturnLineItemModifier[]|null
     */
    public function getReturnModifiers(): ?array
    {
        return $this->returnModifiers;
    }

    /**
     * Sets Return Modifiers.
     *
     * The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
     *
     * @maps return_modifiers
     *
     * @param OrderReturnLineItemModifier[]|null $returnModifiers
     */
    public function setReturnModifiers(?array $returnModifiers): void
    {
        $this->returnModifiers = $returnModifiers;
    }

    /**
     * Returns Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the returned line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderReturnTax` applied to the returned line item. On reads, the amount applied
     * is populated.
     *
     * @return OrderLineItemAppliedTax[]|null
     */
    public function getAppliedTaxes(): ?array
    {
        return $this->appliedTaxes;
    }

    /**
     * Sets Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the returned line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderReturnTax` applied to the returned line item. On reads, the amount applied
     * is populated.
     *
     * @maps applied_taxes
     *
     * @param OrderLineItemAppliedTax[]|null $appliedTaxes
     */
    public function setAppliedTaxes(?array $appliedTaxes): void
    {
        $this->appliedTaxes = $appliedTaxes;
    }

    /**
     * Returns Applied Discounts.
     *
     * The list of references to `OrderReturnDiscount` entities applied to the returned line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderReturnDiscount` applied to the returned line item. On reads, the amount
     * applied is populated.
     *
     * @return OrderLineItemAppliedDiscount[]|null
     */
    public function getAppliedDiscounts(): ?array
    {
        return $this->appliedDiscounts;
    }

    /**
     * Sets Applied Discounts.
     *
     * The list of references to `OrderReturnDiscount` entities applied to the returned line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderReturnDiscount` applied to the returned line item. On reads, the amount
     * applied is populated.
     *
     * @maps applied_discounts
     *
     * @param OrderLineItemAppliedDiscount[]|null $appliedDiscounts
     */
    public function setAppliedDiscounts(?array $appliedDiscounts): void
    {
        $this->appliedDiscounts = $appliedDiscounts;
    }

    /**
     * Returns Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBasePriceMoney(): ?Money
    {
        return $this->basePriceMoney;
    }

    /**
     * Sets Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps base_price_money
     */
    public function setBasePriceMoney(?Money $basePriceMoney): void
    {
        $this->basePriceMoney = $basePriceMoney;
    }

    /**
     * Returns Variation Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getVariationTotalPriceMoney(): ?Money
    {
        return $this->variationTotalPriceMoney;
    }

    /**
     * Sets Variation Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps variation_total_price_money
     */
    public function setVariationTotalPriceMoney(?Money $variationTotalPriceMoney): void
    {
        $this->variationTotalPriceMoney = $variationTotalPriceMoney;
    }

    /**
     * Returns Gross Return Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getGrossReturnMoney(): ?Money
    {
        return $this->grossReturnMoney;
    }

    /**
     * Sets Gross Return Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps gross_return_money
     */
    public function setGrossReturnMoney(?Money $grossReturnMoney): void
    {
        $this->grossReturnMoney = $grossReturnMoney;
    }

    /**
     * Returns Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalTaxMoney(): ?Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * Sets Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_tax_money
     */
    public function setTotalTaxMoney(?Money $totalTaxMoney): void
    {
        $this->totalTaxMoney = $totalTaxMoney;
    }

    /**
     * Returns Total Discount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalDiscountMoney(): ?Money
    {
        return $this->totalDiscountMoney;
    }

    /**
     * Sets Total Discount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_discount_money
     */
    public function setTotalDiscountMoney(?Money $totalDiscountMoney): void
    {
        $this->totalDiscountMoney = $totalDiscountMoney;
    }

    /**
     * Returns Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_money
     */
    public function setTotalMoney(?Money $totalMoney): void
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['uid']                      = $this->uid;
        $json['source_line_item_uid']     = $this->sourceLineItemUid;
        $json['name']                     = $this->name;
        $json['quantity']                 = $this->quantity;
        $json['quantity_unit']            = $this->quantityUnit;
        $json['note']                     = $this->note;
        $json['catalog_object_id']        = $this->catalogObjectId;
        $json['variation_name']           = $this->variationName;
        $json['return_modifiers']         = $this->returnModifiers;
        $json['applied_taxes']            = $this->appliedTaxes;
        $json['applied_discounts']        = $this->appliedDiscounts;
        $json['base_price_money']         = $this->basePriceMoney;
        $json['variation_total_price_money'] = $this->variationTotalPriceMoney;
        $json['gross_return_money']       = $this->grossReturnMoney;
        $json['total_tax_money']          = $this->totalTaxMoney;
        $json['total_discount_money']     = $this->totalDiscountMoney;
        $json['total_money']              = $this->totalMoney;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
