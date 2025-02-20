<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The line item being returned in an order.
 */
class OrderReturnLineItem extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID for this return line-item entry.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $sourceLineItemUid The `uid` of the line item in the original sale order.
     */
    #[JsonProperty('source_line_item_uid')]
    private ?string $sourceLineItemUid;

    /**
     * @var ?string $name The name of the line item.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The quantity returned, formatted as a decimal number.
     * For example, `"3"`.
     *
     * Line items with a `quantity_unit` can have non-integer quantities.
     * For example, `"1.70000"`.
     *
     * @var string $quantity
     */
    #[JsonProperty('quantity')]
    private string $quantity;

    /**
     * @var ?OrderQuantityUnit $quantityUnit The unit and precision that this return line item's quantity is measured in.
     */
    #[JsonProperty('quantity_unit')]
    private ?OrderQuantityUnit $quantityUnit;

    /**
     * @var ?string $note The note of the return line item.
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * @var ?string $catalogObjectId The [CatalogItemVariation](entity:CatalogItemVariation) ID applied to this return line item.
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this line item references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @var ?string $variationName The name of the variation applied to this return line item.
     */
    #[JsonProperty('variation_name')]
    private ?string $variationName;

    /**
     * The type of line item: an itemized return, a non-itemized return (custom amount),
     * or the return of an unactivated gift card sale.
     * See [OrderLineItemItemType](#type-orderlineitemitemtype) for possible values
     *
     * @var ?value-of<OrderLineItemItemType> $itemType
     */
    #[JsonProperty('item_type')]
    private ?string $itemType;

    /**
     * @var ?array<OrderReturnLineItemModifier> $returnModifiers The [CatalogModifier](entity:CatalogModifier)s applied to this line item.
     */
    #[JsonProperty('return_modifiers'), ArrayType([OrderReturnLineItemModifier::class])]
    private ?array $returnModifiers;

    /**
     * The list of references to `OrderReturnTax` entities applied to the return line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderReturnTax` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @var ?array<OrderLineItemAppliedTax> $appliedTaxes
     */
    #[JsonProperty('applied_taxes'), ArrayType([OrderLineItemAppliedTax::class])]
    private ?array $appliedTaxes;

    /**
     * The list of references to `OrderReturnDiscount` entities applied to the return line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderReturnDiscount` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @var ?array<OrderLineItemAppliedDiscount> $appliedDiscounts
     */
    #[JsonProperty('applied_discounts'), ArrayType([OrderLineItemAppliedDiscount::class])]
    private ?array $appliedDiscounts;

    /**
     * @var ?Money $basePriceMoney The base price for a single unit of the line item.
     */
    #[JsonProperty('base_price_money')]
    private ?Money $basePriceMoney;

    /**
     * The total price of all item variations returned in this line item.
     * The price is calculated as `base_price_money` multiplied by `quantity` and
     * does not include modifiers.
     *
     * @var ?Money $variationTotalPriceMoney
     */
    #[JsonProperty('variation_total_price_money')]
    private ?Money $variationTotalPriceMoney;

    /**
     * @var ?Money $grossReturnMoney The gross return amount of money calculated as (item base price + modifiers price) * quantity.
     */
    #[JsonProperty('gross_return_money')]
    private ?Money $grossReturnMoney;

    /**
     * @var ?Money $totalTaxMoney The total amount of tax money to return for the line item.
     */
    #[JsonProperty('total_tax_money')]
    private ?Money $totalTaxMoney;

    /**
     * @var ?Money $totalDiscountMoney The total amount of discount money to return for the line item.
     */
    #[JsonProperty('total_discount_money')]
    private ?Money $totalDiscountMoney;

    /**
     * @var ?Money $totalMoney The total amount of money to return for this line item.
     */
    #[JsonProperty('total_money')]
    private ?Money $totalMoney;

    /**
     * The list of references to `OrderReturnServiceCharge` entities applied to the return
     * line item. Each `OrderLineItemAppliedServiceCharge` has a `service_charge_uid` that
     * references the `uid` of a top-level `OrderReturnServiceCharge` applied to the return line
     * item. On reads, the applied amount is populated.
     *
     * @var ?array<OrderLineItemAppliedServiceCharge> $appliedServiceCharges
     */
    #[JsonProperty('applied_service_charges'), ArrayType([OrderLineItemAppliedServiceCharge::class])]
    private ?array $appliedServiceCharges;

    /**
     * @var ?Money $totalServiceChargeMoney The total amount of apportioned service charge money to return for the line item.
     */
    #[JsonProperty('total_service_charge_money')]
    private ?Money $totalServiceChargeMoney;

    /**
     * @param array{
     *   quantity: string,
     *   uid?: ?string,
     *   sourceLineItemUid?: ?string,
     *   name?: ?string,
     *   quantityUnit?: ?OrderQuantityUnit,
     *   note?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     *   variationName?: ?string,
     *   itemType?: ?value-of<OrderLineItemItemType>,
     *   returnModifiers?: ?array<OrderReturnLineItemModifier>,
     *   appliedTaxes?: ?array<OrderLineItemAppliedTax>,
     *   appliedDiscounts?: ?array<OrderLineItemAppliedDiscount>,
     *   basePriceMoney?: ?Money,
     *   variationTotalPriceMoney?: ?Money,
     *   grossReturnMoney?: ?Money,
     *   totalTaxMoney?: ?Money,
     *   totalDiscountMoney?: ?Money,
     *   totalMoney?: ?Money,
     *   appliedServiceCharges?: ?array<OrderLineItemAppliedServiceCharge>,
     *   totalServiceChargeMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceLineItemUid = $values['sourceLineItemUid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->quantity = $values['quantity'];
        $this->quantityUnit = $values['quantityUnit'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->variationName = $values['variationName'] ?? null;
        $this->itemType = $values['itemType'] ?? null;
        $this->returnModifiers = $values['returnModifiers'] ?? null;
        $this->appliedTaxes = $values['appliedTaxes'] ?? null;
        $this->appliedDiscounts = $values['appliedDiscounts'] ?? null;
        $this->basePriceMoney = $values['basePriceMoney'] ?? null;
        $this->variationTotalPriceMoney = $values['variationTotalPriceMoney'] ?? null;
        $this->grossReturnMoney = $values['grossReturnMoney'] ?? null;
        $this->totalTaxMoney = $values['totalTaxMoney'] ?? null;
        $this->totalDiscountMoney = $values['totalDiscountMoney'] ?? null;
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->appliedServiceCharges = $values['appliedServiceCharges'] ?? null;
        $this->totalServiceChargeMoney = $values['totalServiceChargeMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceLineItemUid(): ?string
    {
        return $this->sourceLineItemUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceLineItemUid(?string $value = null): self
    {
        $this->sourceLineItemUid = $value;
        return $this;
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
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * @param string $value
     */
    public function setQuantity(string $value): self
    {
        $this->quantity = $value;
        return $this;
    }

    /**
     * @return ?OrderQuantityUnit
     */
    public function getQuantityUnit(): ?OrderQuantityUnit
    {
        return $this->quantityUnit;
    }

    /**
     * @param ?OrderQuantityUnit $value
     */
    public function setQuantityUnit(?OrderQuantityUnit $value = null): self
    {
        $this->quantityUnit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectId(?string $value = null): self
    {
        $this->catalogObjectId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * @param ?int $value
     */
    public function setCatalogVersion(?int $value = null): self
    {
        $this->catalogVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVariationName(): ?string
    {
        return $this->variationName;
    }

    /**
     * @param ?string $value
     */
    public function setVariationName(?string $value = null): self
    {
        $this->variationName = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderLineItemItemType>
     */
    public function getItemType(): ?string
    {
        return $this->itemType;
    }

    /**
     * @param ?value-of<OrderLineItemItemType> $value
     */
    public function setItemType(?string $value = null): self
    {
        $this->itemType = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturnLineItemModifier>
     */
    public function getReturnModifiers(): ?array
    {
        return $this->returnModifiers;
    }

    /**
     * @param ?array<OrderReturnLineItemModifier> $value
     */
    public function setReturnModifiers(?array $value = null): self
    {
        $this->returnModifiers = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemAppliedTax>
     */
    public function getAppliedTaxes(): ?array
    {
        return $this->appliedTaxes;
    }

    /**
     * @param ?array<OrderLineItemAppliedTax> $value
     */
    public function setAppliedTaxes(?array $value = null): self
    {
        $this->appliedTaxes = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemAppliedDiscount>
     */
    public function getAppliedDiscounts(): ?array
    {
        return $this->appliedDiscounts;
    }

    /**
     * @param ?array<OrderLineItemAppliedDiscount> $value
     */
    public function setAppliedDiscounts(?array $value = null): self
    {
        $this->appliedDiscounts = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getBasePriceMoney(): ?Money
    {
        return $this->basePriceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setBasePriceMoney(?Money $value = null): self
    {
        $this->basePriceMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getVariationTotalPriceMoney(): ?Money
    {
        return $this->variationTotalPriceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setVariationTotalPriceMoney(?Money $value = null): self
    {
        $this->variationTotalPriceMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getGrossReturnMoney(): ?Money
    {
        return $this->grossReturnMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setGrossReturnMoney(?Money $value = null): self
    {
        $this->grossReturnMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalTaxMoney(): ?Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalTaxMoney(?Money $value = null): self
    {
        $this->totalTaxMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalDiscountMoney(): ?Money
    {
        return $this->totalDiscountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalDiscountMoney(?Money $value = null): self
    {
        $this->totalDiscountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalMoney(?Money $value = null): self
    {
        $this->totalMoney = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemAppliedServiceCharge>
     */
    public function getAppliedServiceCharges(): ?array
    {
        return $this->appliedServiceCharges;
    }

    /**
     * @param ?array<OrderLineItemAppliedServiceCharge> $value
     */
    public function setAppliedServiceCharges(?array $value = null): self
    {
        $this->appliedServiceCharges = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalServiceChargeMoney(): ?Money
    {
        return $this->totalServiceChargeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalServiceChargeMoney(?Money $value = null): self
    {
        $this->totalServiceChargeMoney = $value;
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
