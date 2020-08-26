<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Contains all information related to a single order to process with Square,
 * including line items that specify the products to purchase. Order objects also
 * include information on any associated tenders, refunds, and returns.
 *
 * All Connect V2 Transactions have all been converted to Orders including all associated
 * itemization data.
 */
class Order implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var OrderSource|null
     */
    private $source;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var OrderLineItem[]|null
     */
    private $lineItems;

    /**
     * @var OrderLineItemTax[]|null
     */
    private $taxes;

    /**
     * @var OrderLineItemDiscount[]|null
     */
    private $discounts;

    /**
     * @var OrderServiceCharge[]|null
     */
    private $serviceCharges;

    /**
     * @var OrderFulfillment[]|null
     */
    private $fulfillments;

    /**
     * @var OrderReturn[]|null
     */
    private $returns;

    /**
     * @var OrderMoneyAmounts|null
     */
    private $returnAmounts;

    /**
     * @var OrderMoneyAmounts|null
     */
    private $netAmounts;

    /**
     * @var OrderRoundingAdjustment|null
     */
    private $roundingAdjustment;

    /**
     * @var Tender[]|null
     */
    private $tenders;

    /**
     * @var Refund[]|null
     */
    private $refunds;

    /**
     * @var array|null
     */
    private $metadata;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $closedAt;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var Money|null
     */
    private $totalMoney;

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
    private $totalTipMoney;

    /**
     * @var Money|null
     */
    private $totalServiceChargeMoney;

    /**
     * @var OrderPricingOptions|null
     */
    private $pricingOptions;

    /**
     * @var OrderReward[]|null
     */
    private $rewards;

    /**
     * @param string $locationId
     */
    public function __construct(string $locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Id.
     *
     * The order's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The order's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the merchant location this order is associated with.
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the merchant location this order is associated with.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId(string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Reference Id.
     *
     * A client specified identifier to associate an entity in another system
     * with this order.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * A client specified identifier to associate an entity in another system
     * with this order.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Source.
     *
     * Represents the origination details of an order.
     */
    public function getSource(): ?OrderSource
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * Represents the origination details of an order.
     *
     * @maps source
     */
    public function setSource(?OrderSource $source): void
    {
        $this->source = $source;
    }

    /**
     * Returns Customer Id.
     *
     * The [Customer](#type-customer) ID of the customer associated with the order.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The [Customer](#type-customer) ID of the customer associated with the order.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Line Items.
     *
     * The line items included in the order.
     *
     * @return OrderLineItem[]|null
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * Sets Line Items.
     *
     * The line items included in the order.
     *
     * @maps line_items
     *
     * @param OrderLineItem[]|null $lineItems
     */
    public function setLineItems(?array $lineItems): void
    {
        $this->lineItems = $lineItems;
    }

    /**
     * Returns Taxes.
     *
     * The list of all taxes associated with the order.
     *
     * Taxes can be scoped to either `ORDER` or `LINE_ITEM`. For taxes with `LINE_ITEM` scope, an
     * `OrderLineItemAppliedTax` must be added to each line item that the tax applies to. For taxes
     * with `ORDER` scope, the server will generate an `OrderLineItemAppliedTax` for every line item.
     *
     * On reads, each tax in the list will include the total amount of that tax applied to the order.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any taxes in this field, usage of the deprecated
     * `line_items.taxes` field will result in an error. Please use `line_items.applied_taxes`
     * instead.
     *
     * @return OrderLineItemTax[]|null
     */
    public function getTaxes(): ?array
    {
        return $this->taxes;
    }

    /**
     * Sets Taxes.
     *
     * The list of all taxes associated with the order.
     *
     * Taxes can be scoped to either `ORDER` or `LINE_ITEM`. For taxes with `LINE_ITEM` scope, an
     * `OrderLineItemAppliedTax` must be added to each line item that the tax applies to. For taxes
     * with `ORDER` scope, the server will generate an `OrderLineItemAppliedTax` for every line item.
     *
     * On reads, each tax in the list will include the total amount of that tax applied to the order.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any taxes in this field, usage of the deprecated
     * `line_items.taxes` field will result in an error. Please use `line_items.applied_taxes`
     * instead.
     *
     * @maps taxes
     *
     * @param OrderLineItemTax[]|null $taxes
     */
    public function setTaxes(?array $taxes): void
    {
        $this->taxes = $taxes;
    }

    /**
     * Returns Discounts.
     *
     * The list of all discounts associated with the order.
     *
     * Discounts can be scoped to either `ORDER` or `LINE_ITEM`. For discounts scoped to `LINE_ITEM`,
     * an `OrderLineItemAppliedDiscount` must be added to each line item that the discount applies to.
     * For discounts with `ORDER` scope, the server will generate an `OrderLineItemAppliedDiscount`
     * for every line item.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any discounts in this field, usage of the deprecated
     * `line_items.discounts` field will result in an error. Please use `line_items.applied_discounts`
     * instead.
     *
     * @return OrderLineItemDiscount[]|null
     */
    public function getDiscounts(): ?array
    {
        return $this->discounts;
    }

    /**
     * Sets Discounts.
     *
     * The list of all discounts associated with the order.
     *
     * Discounts can be scoped to either `ORDER` or `LINE_ITEM`. For discounts scoped to `LINE_ITEM`,
     * an `OrderLineItemAppliedDiscount` must be added to each line item that the discount applies to.
     * For discounts with `ORDER` scope, the server will generate an `OrderLineItemAppliedDiscount`
     * for every line item.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any discounts in this field, usage of the deprecated
     * `line_items.discounts` field will result in an error. Please use `line_items.applied_discounts`
     * instead.
     *
     * @maps discounts
     *
     * @param OrderLineItemDiscount[]|null $discounts
     */
    public function setDiscounts(?array $discounts): void
    {
        $this->discounts = $discounts;
    }

    /**
     * Returns Service Charges.
     *
     * A list of service charges applied to the order.
     *
     * @return OrderServiceCharge[]|null
     */
    public function getServiceCharges(): ?array
    {
        return $this->serviceCharges;
    }

    /**
     * Sets Service Charges.
     *
     * A list of service charges applied to the order.
     *
     * @maps service_charges
     *
     * @param OrderServiceCharge[]|null $serviceCharges
     */
    public function setServiceCharges(?array $serviceCharges): void
    {
        $this->serviceCharges = $serviceCharges;
    }

    /**
     * Returns Fulfillments.
     *
     * Details on order fulfillment.
     *
     * Orders can only be created with at most one fulfillment. However, orders returned
     * by the API may contain multiple fulfillments.
     *
     * @return OrderFulfillment[]|null
     */
    public function getFulfillments(): ?array
    {
        return $this->fulfillments;
    }

    /**
     * Sets Fulfillments.
     *
     * Details on order fulfillment.
     *
     * Orders can only be created with at most one fulfillment. However, orders returned
     * by the API may contain multiple fulfillments.
     *
     * @maps fulfillments
     *
     * @param OrderFulfillment[]|null $fulfillments
     */
    public function setFulfillments(?array $fulfillments): void
    {
        $this->fulfillments = $fulfillments;
    }

    /**
     * Returns Returns.
     *
     * Collection of items from sale Orders being returned in this one. Normally part of an
     * Itemized Return or Exchange.  There will be exactly one `Return` object per sale Order being
     * referenced.
     *
     * @return OrderReturn[]|null
     */
    public function getReturns(): ?array
    {
        return $this->returns;
    }

    /**
     * Sets Returns.
     *
     * Collection of items from sale Orders being returned in this one. Normally part of an
     * Itemized Return or Exchange.  There will be exactly one `Return` object per sale Order being
     * referenced.
     *
     * @maps returns
     *
     * @param OrderReturn[]|null $returns
     */
    public function setReturns(?array $returns): void
    {
        $this->returns = $returns;
    }

    /**
     * Returns Return Amounts.
     *
     * A collection of various money amounts.
     */
    public function getReturnAmounts(): ?OrderMoneyAmounts
    {
        return $this->returnAmounts;
    }

    /**
     * Sets Return Amounts.
     *
     * A collection of various money amounts.
     *
     * @maps return_amounts
     */
    public function setReturnAmounts(?OrderMoneyAmounts $returnAmounts): void
    {
        $this->returnAmounts = $returnAmounts;
    }

    /**
     * Returns Net Amounts.
     *
     * A collection of various money amounts.
     */
    public function getNetAmounts(): ?OrderMoneyAmounts
    {
        return $this->netAmounts;
    }

    /**
     * Sets Net Amounts.
     *
     * A collection of various money amounts.
     *
     * @maps net_amounts
     */
    public function setNetAmounts(?OrderMoneyAmounts $netAmounts): void
    {
        $this->netAmounts = $netAmounts;
    }

    /**
     * Returns Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply Cash Rounding
     * when the minimum unit of account is smaller than the lowest physical denomination of currency.
     */
    public function getRoundingAdjustment(): ?OrderRoundingAdjustment
    {
        return $this->roundingAdjustment;
    }

    /**
     * Sets Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply Cash Rounding
     * when the minimum unit of account is smaller than the lowest physical denomination of currency.
     *
     * @maps rounding_adjustment
     */
    public function setRoundingAdjustment(?OrderRoundingAdjustment $roundingAdjustment): void
    {
        $this->roundingAdjustment = $roundingAdjustment;
    }

    /**
     * Returns Tenders.
     *
     * The Tenders which were used to pay for the Order.
     *
     * @return Tender[]|null
     */
    public function getTenders(): ?array
    {
        return $this->tenders;
    }

    /**
     * Sets Tenders.
     *
     * The Tenders which were used to pay for the Order.
     *
     * @maps tenders
     *
     * @param Tender[]|null $tenders
     */
    public function setTenders(?array $tenders): void
    {
        $this->tenders = $tenders;
    }

    /**
     * Returns Refunds.
     *
     * The Refunds that are part of this Order.
     *
     * @return Refund[]|null
     */
    public function getRefunds(): ?array
    {
        return $this->refunds;
    }

    /**
     * Sets Refunds.
     *
     * The Refunds that are part of this Order.
     *
     * @maps refunds
     *
     * @param Refund[]|null $refunds
     */
    public function setRefunds(?array $refunds): void
    {
        $this->refunds = $refunds;
    }

    /**
     * Returns Metadata.
     *
     * Application-defined data attached to this order. Metadata fields are intended
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
     * Application-defined data attached to this order. Metadata fields are intended
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
     * Returns Created At.
     *
     * Timestamp for when the order was created. In RFC 3339 format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Timestamp for when the order was created. In RFC 3339 format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * Timestamp for when the order was last updated. In RFC 3339 format, e.g., "2016-09-04T23:59:33.123Z".
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * Timestamp for when the order was last updated. In RFC 3339 format, e.g., "2016-09-04T23:59:33.123Z".
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Closed At.
     *
     * Timestamp for when the order reached a terminal [state](#property-state). In RFC 3339 format, e.g.,
     * "2016-09-04T23:59:33.123Z".
     */
    public function getClosedAt(): ?string
    {
        return $this->closedAt;
    }

    /**
     * Sets Closed At.
     *
     * Timestamp for when the order reached a terminal [state](#property-state). In RFC 3339 format, e.g.,
     * "2016-09-04T23:59:33.123Z".
     *
     * @maps closed_at
     */
    public function setClosedAt(?string $closedAt): void
    {
        $this->closedAt = $closedAt;
    }

    /**
     * Returns State.
     *
     * The state of the order.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * The state of the order.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Version.
     *
     * Version number which is incremented each time an update is committed to the order.
     * Orders that were not created through the API will not include a version and
     * thus cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Version number which is incremented each time an update is committed to the order.
     * Orders that were not created through the API will not include a version and
     * thus cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
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
     * Returns Total Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalTipMoney(): ?Money
    {
        return $this->totalTipMoney;
    }

    /**
     * Sets Total Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_tip_money
     */
    public function setTotalTipMoney(?Money $totalTipMoney): void
    {
        $this->totalTipMoney = $totalTipMoney;
    }

    /**
     * Returns Total Service Charge Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalServiceChargeMoney(): ?Money
    {
        return $this->totalServiceChargeMoney;
    }

    /**
     * Sets Total Service Charge Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_service_charge_money
     */
    public function setTotalServiceChargeMoney(?Money $totalServiceChargeMoney): void
    {
        $this->totalServiceChargeMoney = $totalServiceChargeMoney;
    }

    /**
     * Returns Pricing Options.
     *
     * Pricing options for an order. The options affect how the order's price is calculated.
     * They can be used, for example, to apply automatic price adjustments that are based on pre-
     * configured
     * [pricing rules](https://developer.squareup.com/docs/reference/square/objects/CatalogPricingRule).
     */
    public function getPricingOptions(): ?OrderPricingOptions
    {
        return $this->pricingOptions;
    }

    /**
     * Sets Pricing Options.
     *
     * Pricing options for an order. The options affect how the order's price is calculated.
     * They can be used, for example, to apply automatic price adjustments that are based on pre-
     * configured
     * [pricing rules](https://developer.squareup.com/docs/reference/square/objects/CatalogPricingRule).
     *
     * @maps pricing_options
     */
    public function setPricingOptions(?OrderPricingOptions $pricingOptions): void
    {
        $this->pricingOptions = $pricingOptions;
    }

    /**
     * Returns Rewards.
     *
     * A set-like list of rewards that have been added to the order.
     *
     * @return OrderReward[]|null
     */
    public function getRewards(): ?array
    {
        return $this->rewards;
    }

    /**
     * Sets Rewards.
     *
     * A set-like list of rewards that have been added to the order.
     *
     * @maps rewards
     *
     * @param OrderReward[]|null $rewards
     */
    public function setRewards(?array $rewards): void
    {
        $this->rewards = $rewards;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                      = $this->id;
        $json['location_id']             = $this->locationId;
        $json['reference_id']            = $this->referenceId;
        $json['source']                  = $this->source;
        $json['customer_id']             = $this->customerId;
        $json['line_items']              = $this->lineItems;
        $json['taxes']                   = $this->taxes;
        $json['discounts']               = $this->discounts;
        $json['service_charges']         = $this->serviceCharges;
        $json['fulfillments']            = $this->fulfillments;
        $json['returns']                 = $this->returns;
        $json['return_amounts']          = $this->returnAmounts;
        $json['net_amounts']             = $this->netAmounts;
        $json['rounding_adjustment']     = $this->roundingAdjustment;
        $json['tenders']                 = $this->tenders;
        $json['refunds']                 = $this->refunds;
        $json['metadata']                = $this->metadata;
        $json['created_at']              = $this->createdAt;
        $json['updated_at']              = $this->updatedAt;
        $json['closed_at']               = $this->closedAt;
        $json['state']                   = $this->state;
        $json['version']                 = $this->version;
        $json['total_money']             = $this->totalMoney;
        $json['total_tax_money']         = $this->totalTaxMoney;
        $json['total_discount_money']    = $this->totalDiscountMoney;
        $json['total_tip_money']         = $this->totalTipMoney;
        $json['total_service_charge_money'] = $this->totalServiceChargeMoney;
        $json['pricing_options']         = $this->pricingOptions;
        $json['rewards']                 = $this->rewards;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
