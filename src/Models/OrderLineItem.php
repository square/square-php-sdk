<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a line item in an order. Each line item describes a different
 * product to purchase, with its own quantity and price details.
 */
class OrderLineItem implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

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
     * @var array|null
     */
    private $metadata;

    /**
     * @var OrderLineItemModifier[]|null
     */
    private $modifiers;

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
    private $grossSalesMoney;

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
     * @var OrderLineItemPricingBlocklists|null
     */
    private $pricingBlocklists;

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
     * Unique ID that identifies the line item only within this order.
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID that identifies the line item only within this order.
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
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
     * The quantity purchased, formatted as a decimal number.
     * For example: `"3"`.
     *
     * Line items with a quantity of `"0"` will be automatically removed
     * upon paying for or otherwise completing the order.
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
     * The quantity purchased, formatted as a decimal number.
     * For example: `"3"`.
     *
     * Line items with a quantity of `"0"` will be automatically removed
     * upon paying for or otherwise completing the order.
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
     * The note of the line item.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * The note of the line item.
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
     * The [CatalogItemVariation](#type-catalogitemvariation) id applied to this line item.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The [CatalogItemVariation](#type-catalogitemvariation) id applied to this line item.
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
     * The name of the variation applied to this line item.
     */
    public function getVariationName(): ?string
    {
        return $this->variationName;
    }

    /**
     * Sets Variation Name.
     *
     * The name of the variation applied to this line item.
     *
     * @maps variation_name
     */
    public function setVariationName(?string $variationName): void
    {
        $this->variationName = $variationName;
    }

    /**
     * Returns Metadata.
     *
     * Application-defined data attached to this line item. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (personally
     * identifiable information, card details, etc.).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries may also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a max length of 255 characters.
     *
     * An application may have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * See [Metadata](https://developer.squareup.com/docs/build-basics/metadata) for more information.
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * Sets Metadata.
     *
     * Application-defined data attached to this line item. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (personally
     * identifiable information, card details, etc.).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries may also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a max length of 255 characters.
     *
     * An application may have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * See [Metadata](https://developer.squareup.com/docs/build-basics/metadata) for more information.
     *
     * @maps metadata
     */
    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }

    /**
     * Returns Modifiers.
     *
     * The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
     *
     * @return OrderLineItemModifier[]|null
     */
    public function getModifiers(): ?array
    {
        return $this->modifiers;
    }

    /**
     * Sets Modifiers.
     *
     * The [CatalogModifier](#type-catalogmodifier)s applied to this line item.
     *
     * @maps modifiers
     *
     * @param OrderLineItemModifier[]|null $modifiers
     */
    public function setModifiers(?array $modifiers): void
    {
        $this->modifiers = $modifiers;
    }

    /**
     * Returns Applied Taxes.
     *
     * The list of references to taxes applied to this line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a
     * top-level `OrderLineItemTax` applied to the line item. On reads, the
     * amount applied is populated.
     *
     * An `OrderLineItemAppliedTax` will be automatically created on every line
     * item for all `ORDER` scoped taxes added to the order. `OrderLineItemAppliedTax`
     * records for `LINE_ITEM` scoped taxes must be added in requests for the tax
     * to apply to any line items.
     *
     * To change the amount of a tax, modify the referenced top-level tax.
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
     * The list of references to taxes applied to this line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a
     * top-level `OrderLineItemTax` applied to the line item. On reads, the
     * amount applied is populated.
     *
     * An `OrderLineItemAppliedTax` will be automatically created on every line
     * item for all `ORDER` scoped taxes added to the order. `OrderLineItemAppliedTax`
     * records for `LINE_ITEM` scoped taxes must be added in requests for the tax
     * to apply to any line items.
     *
     * To change the amount of a tax, modify the referenced top-level tax.
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
     * The list of references to discounts applied to this line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderLineItemDiscounts` applied to the line item. On reads, the amount
     * applied is populated.
     *
     * An `OrderLineItemAppliedDiscount` will be automatically created on every line item for all
     * `ORDER` scoped discounts that are added to the order. `OrderLineItemAppliedDiscount` records
     * for `LINE_ITEM` scoped discounts must be added in requests for the discount to apply to any
     * line items.
     *
     * To change the amount of a discount, modify the referenced top-level discount.
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
     * The list of references to discounts applied to this line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderLineItemDiscounts` applied to the line item. On reads, the amount
     * applied is populated.
     *
     * An `OrderLineItemAppliedDiscount` will be automatically created on every line item for all
     * `ORDER` scoped discounts that are added to the order. `OrderLineItemAppliedDiscount` records
     * for `LINE_ITEM` scoped discounts must be added in requests for the discount to apply to any
     * line items.
     *
     * To change the amount of a discount, modify the referenced top-level discount.
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
     * Returns Gross Sales Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getGrossSalesMoney(): ?Money
    {
        return $this->grossSalesMoney;
    }

    /**
     * Sets Gross Sales Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps gross_sales_money
     */
    public function setGrossSalesMoney(?Money $grossSalesMoney): void
    {
        $this->grossSalesMoney = $grossSalesMoney;
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
     * Returns Pricing Blocklists.
     *
     * Describes pricing adjustments that are blocked from manual and
     * automatic application to a line item. For more information, see
     * [Apply Taxes and Discounts](https://developer.squareup.com/docs/orders-api/apply-taxes-and-
     * discounts).
     */
    public function getPricingBlocklists(): ?OrderLineItemPricingBlocklists
    {
        return $this->pricingBlocklists;
    }

    /**
     * Sets Pricing Blocklists.
     *
     * Describes pricing adjustments that are blocked from manual and
     * automatic application to a line item. For more information, see
     * [Apply Taxes and Discounts](https://developer.squareup.com/docs/orders-api/apply-taxes-and-
     * discounts).
     *
     * @maps pricing_blocklists
     */
    public function setPricingBlocklists(?OrderLineItemPricingBlocklists $pricingBlocklists): void
    {
        $this->pricingBlocklists = $pricingBlocklists;
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
        $json['name']                     = $this->name;
        $json['quantity']                 = $this->quantity;
        $json['quantity_unit']            = $this->quantityUnit;
        $json['note']                     = $this->note;
        $json['catalog_object_id']        = $this->catalogObjectId;
        $json['variation_name']           = $this->variationName;
        $json['metadata']                 = $this->metadata;
        $json['modifiers']                = $this->modifiers;
        $json['applied_taxes']            = $this->appliedTaxes;
        $json['applied_discounts']        = $this->appliedDiscounts;
        $json['base_price_money']         = $this->basePriceMoney;
        $json['variation_total_price_money'] = $this->variationTotalPriceMoney;
        $json['gross_sales_money']        = $this->grossSalesMoney;
        $json['total_tax_money']          = $this->totalTaxMoney;
        $json['total_discount_money']     = $this->totalDiscountMoney;
        $json['total_money']              = $this->totalMoney;
        $json['pricing_blocklists']       = $this->pricingBlocklists;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
