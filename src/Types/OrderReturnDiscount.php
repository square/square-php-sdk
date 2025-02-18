<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a discount being returned that applies to one or more return line items in an
 * order.
 *
 * Fixed-amount, order-scoped discounts are distributed across all non-zero return line item totals.
 * The amount distributed to each return line item is relative to that item’s contribution to the
 * order subtotal.
 */
class OrderReturnDiscount extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the returned discount only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $sourceDiscountUid The discount `uid` from the order that contains the original application of this discount.
     */
    #[JsonProperty('source_discount_uid')]
    private ?string $sourceDiscountUid;

    /**
     * @var ?string $catalogObjectId The catalog object ID referencing [CatalogDiscount](entity:CatalogDiscount).
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this discount references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @var ?string $name The discount's name.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * The type of the discount. If it is created by the API, it is `FIXED_PERCENTAGE` or `FIXED_AMOUNT`.
     *
     * Discounts that do not reference a catalog object ID must have a type of
     * `FIXED_PERCENTAGE` or `FIXED_AMOUNT`.
     * See [OrderLineItemDiscountType](#type-orderlineitemdiscounttype) for possible values
     *
     * @var ?value-of<OrderLineItemDiscountType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The percentage of the tax, as a string representation of a decimal number.
     * A value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * `percentage` is not set for amount-based discounts.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * The total declared monetary amount of the discount.
     *
     * `amount_money` is not set for percentage-based discounts.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * The amount of discount actually applied to this line item. When an amount-based
     * discount is at the order level, this value is different from `amount_money` because the discount
     * is distributed across the line items.
     *
     * @var ?Money $appliedMoney
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * Indicates the level at which the `OrderReturnDiscount` applies. For `ORDER` scoped
     * discounts, the server generates references in `applied_discounts` on all
     * `OrderReturnLineItem`s. For `LINE_ITEM` scoped discounts, the discount is only applied to
     * `OrderReturnLineItem`s with references in their `applied_discounts` field.
     * See [OrderLineItemDiscountScope](#type-orderlineitemdiscountscope) for possible values
     *
     * @var ?value-of<OrderLineItemDiscountScope> $scope
     */
    #[JsonProperty('scope')]
    private ?string $scope;

    /**
     * @param array{
     *   uid?: ?string,
     *   sourceDiscountUid?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     *   name?: ?string,
     *   type?: ?value-of<OrderLineItemDiscountType>,
     *   percentage?: ?string,
     *   amountMoney?: ?Money,
     *   appliedMoney?: ?Money,
     *   scope?: ?value-of<OrderLineItemDiscountScope>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceDiscountUid = $values['sourceDiscountUid'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->appliedMoney = $values['appliedMoney'] ?? null;
        $this->scope = $values['scope'] ?? null;
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
    public function getSourceDiscountUid(): ?string
    {
        return $this->sourceDiscountUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceDiscountUid(?string $value = null): self
    {
        $this->sourceDiscountUid = $value;
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
     * @return ?value-of<OrderLineItemDiscountType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<OrderLineItemDiscountType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPercentage(): ?string
    {
        return $this->percentage;
    }

    /**
     * @param ?string $value
     */
    public function setPercentage(?string $value = null): self
    {
        $this->percentage = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAppliedMoney(): ?Money
    {
        return $this->appliedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAppliedMoney(?Money $value = null): self
    {
        $this->appliedMoney = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderLineItemDiscountScope>
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param ?value-of<OrderLineItemDiscountScope> $value
     */
    public function setScope(?string $value = null): self
    {
        $this->scope = $value;
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
