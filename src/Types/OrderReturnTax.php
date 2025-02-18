<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a tax being returned that applies to one or more return line items in an order.
 *
 * Fixed-amount, order-scoped taxes are distributed across all non-zero return line item totals.
 * The amount distributed to each return line item is relative to that item’s contribution to the
 * order subtotal.
 */
class OrderReturnTax extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the returned tax only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $sourceTaxUid The tax `uid` from the order that contains the original tax charge.
     */
    #[JsonProperty('source_tax_uid')]
    private ?string $sourceTaxUid;

    /**
     * @var ?string $catalogObjectId The catalog object ID referencing [CatalogTax](entity:CatalogTax).
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * @var ?int $catalogVersion The version of the catalog object that this tax references.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @var ?string $name The tax's name.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * Indicates the calculation method used to apply the tax.
     * See [OrderLineItemTaxType](#type-orderlineitemtaxtype) for possible values
     *
     * @var ?value-of<OrderLineItemTaxType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * The percentage of the tax, as a string representation of a decimal number.
     * For example, a value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * @var ?string $percentage
     */
    #[JsonProperty('percentage')]
    private ?string $percentage;

    /**
     * @var ?Money $appliedMoney The amount of money applied by the tax in an order.
     */
    #[JsonProperty('applied_money')]
    private ?Money $appliedMoney;

    /**
     * Indicates the level at which the `OrderReturnTax` applies. For `ORDER` scoped
     * taxes, Square generates references in `applied_taxes` on all
     * `OrderReturnLineItem`s. For `LINE_ITEM` scoped taxes, the tax is only applied to
     * `OrderReturnLineItem`s with references in their `applied_discounts` field.
     * See [OrderLineItemTaxScope](#type-orderlineitemtaxscope) for possible values
     *
     * @var ?value-of<OrderLineItemTaxScope> $scope
     */
    #[JsonProperty('scope')]
    private ?string $scope;

    /**
     * @param array{
     *   uid?: ?string,
     *   sourceTaxUid?: ?string,
     *   catalogObjectId?: ?string,
     *   catalogVersion?: ?int,
     *   name?: ?string,
     *   type?: ?value-of<OrderLineItemTaxType>,
     *   percentage?: ?string,
     *   appliedMoney?: ?Money,
     *   scope?: ?value-of<OrderLineItemTaxScope>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->sourceTaxUid = $values['sourceTaxUid'] ?? null;
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->percentage = $values['percentage'] ?? null;
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
    public function getSourceTaxUid(): ?string
    {
        return $this->sourceTaxUid;
    }

    /**
     * @param ?string $value
     */
    public function setSourceTaxUid(?string $value = null): self
    {
        $this->sourceTaxUid = $value;
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
     * @return ?value-of<OrderLineItemTaxType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<OrderLineItemTaxType> $value
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
     * @return ?value-of<OrderLineItemTaxScope>
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param ?value-of<OrderLineItemTaxScope> $value
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
