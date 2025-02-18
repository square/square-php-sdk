<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Core\Types\Union;

/**
 * Contains all information related to a single order to process with Square,
 * including line items that specify the products to purchase. `Order` objects also
 * include information about any associated tenders, refunds, and returns.
 *
 * All Connect V2 Transactions have all been converted to Orders including all associated
 * itemization data.
 */
class Order extends JsonSerializableType
{
    /**
     * @var ?string $id The order's unique ID.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $locationId The ID of the seller location that this order is associated with.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * A client-specified ID to associate an entity in another system
     * with this order.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @var ?OrderSource $source The origination details of the order.
     */
    #[JsonProperty('source')]
    private ?OrderSource $source;

    /**
     * The ID of the [customer](entity:Customer) associated with the order.
     *
     * You should specify a `customer_id` on the order (or the payment) to ensure that transactions
     * are reliably linked to customers. Omitting this field might result in the creation of new
     * [instant profiles](https://developer.squareup.com/docs/customers-api/what-it-does#instant-profiles).
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @var ?array<OrderLineItem> $lineItems The line items included in the order.
     */
    #[JsonProperty('line_items'), ArrayType([OrderLineItem::class])]
    private ?array $lineItems;

    /**
     * The list of all taxes associated with the order.
     *
     * Taxes can be scoped to either `ORDER` or `LINE_ITEM`. For taxes with `LINE_ITEM` scope, an
     * `OrderLineItemAppliedTax` must be added to each line item that the tax applies to. For taxes
     * with `ORDER` scope, the server generates an `OrderLineItemAppliedTax` for every line item.
     *
     * On reads, each tax in the list includes the total amount of that tax applied to the order.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any taxes in this field, using the deprecated
     * `line_items.taxes` field results in an error. Use `line_items.applied_taxes`
     * instead.
     *
     * @var ?array<OrderLineItemTax> $taxes
     */
    #[JsonProperty('taxes'), ArrayType([OrderLineItemTax::class])]
    private ?array $taxes;

    /**
     * The list of all discounts associated with the order.
     *
     * Discounts can be scoped to either `ORDER` or `LINE_ITEM`. For discounts scoped to `LINE_ITEM`,
     * an `OrderLineItemAppliedDiscount` must be added to each line item that the discount applies to.
     * For discounts with `ORDER` scope, the server generates an `OrderLineItemAppliedDiscount`
     * for every line item.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any discounts in this field, using the deprecated
     * `line_items.discounts` field results in an error. Use `line_items.applied_discounts`
     * instead.
     *
     * @var ?array<OrderLineItemDiscount> $discounts
     */
    #[JsonProperty('discounts'), ArrayType([OrderLineItemDiscount::class])]
    private ?array $discounts;

    /**
     * @var ?array<OrderServiceCharge> $serviceCharges A list of service charges applied to the order.
     */
    #[JsonProperty('service_charges'), ArrayType([OrderServiceCharge::class])]
    private ?array $serviceCharges;

    /**
     * Details about order fulfillment.
     *
     * Orders can only be created with at most one fulfillment. However, orders returned
     * by the API might contain multiple fulfillments.
     *
     * @var ?array<Fulfillment> $fulfillments
     */
    #[JsonProperty('fulfillments'), ArrayType([Fulfillment::class])]
    private ?array $fulfillments;

    /**
     * A collection of items from sale orders being returned in this one. Normally part of an
     * itemized return or exchange. There is exactly one `Return` object per sale `Order` being
     * referenced.
     *
     * @var ?array<OrderReturn> $returns
     */
    #[JsonProperty('returns'), ArrayType([OrderReturn::class])]
    private ?array $returns;

    /**
     * @var ?OrderMoneyAmounts $returnAmounts The rollup of the returned money amounts.
     */
    #[JsonProperty('return_amounts')]
    private ?OrderMoneyAmounts $returnAmounts;

    /**
     * @var ?OrderMoneyAmounts $netAmounts The net money amounts (sale money - return money).
     */
    #[JsonProperty('net_amounts')]
    private ?OrderMoneyAmounts $netAmounts;

    /**
     * A positive rounding adjustment to the total of the order. This adjustment is commonly
     * used to apply cash rounding when the minimum unit of account is smaller than the lowest physical
     * denomination of the currency.
     *
     * @var ?OrderRoundingAdjustment $roundingAdjustment
     */
    #[JsonProperty('rounding_adjustment')]
    private ?OrderRoundingAdjustment $roundingAdjustment;

    /**
     * @var ?array<Tender> $tenders The tenders that were used to pay for the order.
     */
    #[JsonProperty('tenders'), ArrayType([Tender::class])]
    private ?array $tenders;

    /**
     * @var ?array<Refund> $refunds The refunds that are part of this order.
     */
    #[JsonProperty('refunds'), ArrayType([Refund::class])]
    private ?array $refunds;

    /**
     * Application-defined data attached to this order. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see  [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     *
     * @var ?array<string, ?string> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => new Union('string', 'null')])]
    private ?array $metadata;

    /**
     * @var ?string $createdAt The timestamp for when the order was created, at server side, in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp for when the order was last updated, at server side, in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $closedAt The timestamp for when the order reached a terminal [state](entity:OrderState), in RFC 3339 format (for example "2016-09-04T23:59:33.123Z").
     */
    #[JsonProperty('closed_at')]
    private ?string $closedAt;

    /**
     * The current state of the order.
     * See [OrderState](#type-orderstate) for possible values
     *
     * @var ?value-of<OrderState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * The version number, which is incremented each time an update is committed to the order.
     * Orders not created through the API do not include a version number and
     * therefore cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders).
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?Money $totalMoney The total amount of money to collect for the order.
     */
    #[JsonProperty('total_money')]
    private ?Money $totalMoney;

    /**
     * @var ?Money $totalTaxMoney The total amount of tax money to collect for the order.
     */
    #[JsonProperty('total_tax_money')]
    private ?Money $totalTaxMoney;

    /**
     * @var ?Money $totalDiscountMoney The total amount of discount money to collect for the order.
     */
    #[JsonProperty('total_discount_money')]
    private ?Money $totalDiscountMoney;

    /**
     * @var ?Money $totalTipMoney The total amount of tip money to collect for the order.
     */
    #[JsonProperty('total_tip_money')]
    private ?Money $totalTipMoney;

    /**
     * The total amount of money collected in service charges for the order.
     *
     * Note: `total_service_charge_money` is the sum of `applied_money` fields for each individual
     * service charge. Therefore, `total_service_charge_money` only includes inclusive tax amounts,
     * not additive tax amounts.
     *
     * @var ?Money $totalServiceChargeMoney
     */
    #[JsonProperty('total_service_charge_money')]
    private ?Money $totalServiceChargeMoney;

    /**
     * A short-term identifier for the order (such as a customer first name,
     * table number, or auto-generated order number that resets daily).
     *
     * @var ?string $ticketName
     */
    #[JsonProperty('ticket_name')]
    private ?string $ticketName;

    /**
     * Pricing options for an order. The options affect how the order's price is calculated.
     * They can be used, for example, to apply automatic price adjustments that are based on
     * preconfigured [pricing rules](entity:CatalogPricingRule).
     *
     * @var ?OrderPricingOptions $pricingOptions
     */
    #[JsonProperty('pricing_options')]
    private ?OrderPricingOptions $pricingOptions;

    /**
     * @var ?array<OrderReward> $rewards A set-like list of Rewards that have been added to the Order.
     */
    #[JsonProperty('rewards'), ArrayType([OrderReward::class])]
    private ?array $rewards;

    /**
     * @var ?Money $netAmountDueMoney The net amount of money due on the order.
     */
    #[JsonProperty('net_amount_due_money')]
    private ?Money $netAmountDueMoney;

    /**
     * @param array{
     *   locationId: string,
     *   id?: ?string,
     *   referenceId?: ?string,
     *   source?: ?OrderSource,
     *   customerId?: ?string,
     *   lineItems?: ?array<OrderLineItem>,
     *   taxes?: ?array<OrderLineItemTax>,
     *   discounts?: ?array<OrderLineItemDiscount>,
     *   serviceCharges?: ?array<OrderServiceCharge>,
     *   fulfillments?: ?array<Fulfillment>,
     *   returns?: ?array<OrderReturn>,
     *   returnAmounts?: ?OrderMoneyAmounts,
     *   netAmounts?: ?OrderMoneyAmounts,
     *   roundingAdjustment?: ?OrderRoundingAdjustment,
     *   tenders?: ?array<Tender>,
     *   refunds?: ?array<Refund>,
     *   metadata?: ?array<string, ?string>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   closedAt?: ?string,
     *   state?: ?value-of<OrderState>,
     *   version?: ?int,
     *   totalMoney?: ?Money,
     *   totalTaxMoney?: ?Money,
     *   totalDiscountMoney?: ?Money,
     *   totalTipMoney?: ?Money,
     *   totalServiceChargeMoney?: ?Money,
     *   ticketName?: ?string,
     *   pricingOptions?: ?OrderPricingOptions,
     *   rewards?: ?array<OrderReward>,
     *   netAmountDueMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->locationId = $values['locationId'];
        $this->referenceId = $values['referenceId'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->lineItems = $values['lineItems'] ?? null;
        $this->taxes = $values['taxes'] ?? null;
        $this->discounts = $values['discounts'] ?? null;
        $this->serviceCharges = $values['serviceCharges'] ?? null;
        $this->fulfillments = $values['fulfillments'] ?? null;
        $this->returns = $values['returns'] ?? null;
        $this->returnAmounts = $values['returnAmounts'] ?? null;
        $this->netAmounts = $values['netAmounts'] ?? null;
        $this->roundingAdjustment = $values['roundingAdjustment'] ?? null;
        $this->tenders = $values['tenders'] ?? null;
        $this->refunds = $values['refunds'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->closedAt = $values['closedAt'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->totalTaxMoney = $values['totalTaxMoney'] ?? null;
        $this->totalDiscountMoney = $values['totalDiscountMoney'] ?? null;
        $this->totalTipMoney = $values['totalTipMoney'] ?? null;
        $this->totalServiceChargeMoney = $values['totalServiceChargeMoney'] ?? null;
        $this->ticketName = $values['ticketName'] ?? null;
        $this->pricingOptions = $values['pricingOptions'] ?? null;
        $this->rewards = $values['rewards'] ?? null;
        $this->netAmountDueMoney = $values['netAmountDueMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?OrderSource
     */
    public function getSource(): ?OrderSource
    {
        return $this->source;
    }

    /**
     * @param ?OrderSource $value
     */
    public function setSource(?OrderSource $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItem>
     */
    public function getLineItems(): ?array
    {
        return $this->lineItems;
    }

    /**
     * @param ?array<OrderLineItem> $value
     */
    public function setLineItems(?array $value = null): self
    {
        $this->lineItems = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemTax>
     */
    public function getTaxes(): ?array
    {
        return $this->taxes;
    }

    /**
     * @param ?array<OrderLineItemTax> $value
     */
    public function setTaxes(?array $value = null): self
    {
        $this->taxes = $value;
        return $this;
    }

    /**
     * @return ?array<OrderLineItemDiscount>
     */
    public function getDiscounts(): ?array
    {
        return $this->discounts;
    }

    /**
     * @param ?array<OrderLineItemDiscount> $value
     */
    public function setDiscounts(?array $value = null): self
    {
        $this->discounts = $value;
        return $this;
    }

    /**
     * @return ?array<OrderServiceCharge>
     */
    public function getServiceCharges(): ?array
    {
        return $this->serviceCharges;
    }

    /**
     * @param ?array<OrderServiceCharge> $value
     */
    public function setServiceCharges(?array $value = null): self
    {
        $this->serviceCharges = $value;
        return $this;
    }

    /**
     * @return ?array<Fulfillment>
     */
    public function getFulfillments(): ?array
    {
        return $this->fulfillments;
    }

    /**
     * @param ?array<Fulfillment> $value
     */
    public function setFulfillments(?array $value = null): self
    {
        $this->fulfillments = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReturn>
     */
    public function getReturns(): ?array
    {
        return $this->returns;
    }

    /**
     * @param ?array<OrderReturn> $value
     */
    public function setReturns(?array $value = null): self
    {
        $this->returns = $value;
        return $this;
    }

    /**
     * @return ?OrderMoneyAmounts
     */
    public function getReturnAmounts(): ?OrderMoneyAmounts
    {
        return $this->returnAmounts;
    }

    /**
     * @param ?OrderMoneyAmounts $value
     */
    public function setReturnAmounts(?OrderMoneyAmounts $value = null): self
    {
        $this->returnAmounts = $value;
        return $this;
    }

    /**
     * @return ?OrderMoneyAmounts
     */
    public function getNetAmounts(): ?OrderMoneyAmounts
    {
        return $this->netAmounts;
    }

    /**
     * @param ?OrderMoneyAmounts $value
     */
    public function setNetAmounts(?OrderMoneyAmounts $value = null): self
    {
        $this->netAmounts = $value;
        return $this;
    }

    /**
     * @return ?OrderRoundingAdjustment
     */
    public function getRoundingAdjustment(): ?OrderRoundingAdjustment
    {
        return $this->roundingAdjustment;
    }

    /**
     * @param ?OrderRoundingAdjustment $value
     */
    public function setRoundingAdjustment(?OrderRoundingAdjustment $value = null): self
    {
        $this->roundingAdjustment = $value;
        return $this;
    }

    /**
     * @return ?array<Tender>
     */
    public function getTenders(): ?array
    {
        return $this->tenders;
    }

    /**
     * @param ?array<Tender> $value
     */
    public function setTenders(?array $value = null): self
    {
        $this->tenders = $value;
        return $this;
    }

    /**
     * @return ?array<Refund>
     */
    public function getRefunds(): ?array
    {
        return $this->refunds;
    }

    /**
     * @param ?array<Refund> $value
     */
    public function setRefunds(?array $value = null): self
    {
        $this->refunds = $value;
        return $this;
    }

    /**
     * @return ?array<string, ?string>
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param ?array<string, ?string> $value
     */
    public function setMetadata(?array $value = null): self
    {
        $this->metadata = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getClosedAt(): ?string
    {
        return $this->closedAt;
    }

    /**
     * @param ?string $value
     */
    public function setClosedAt(?string $value = null): self
    {
        $this->closedAt = $value;
        return $this;
    }

    /**
     * @return ?value-of<OrderState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<OrderState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
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
    public function getTotalTipMoney(): ?Money
    {
        return $this->totalTipMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalTipMoney(?Money $value = null): self
    {
        $this->totalTipMoney = $value;
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
     * @return ?string
     */
    public function getTicketName(): ?string
    {
        return $this->ticketName;
    }

    /**
     * @param ?string $value
     */
    public function setTicketName(?string $value = null): self
    {
        $this->ticketName = $value;
        return $this;
    }

    /**
     * @return ?OrderPricingOptions
     */
    public function getPricingOptions(): ?OrderPricingOptions
    {
        return $this->pricingOptions;
    }

    /**
     * @param ?OrderPricingOptions $value
     */
    public function setPricingOptions(?OrderPricingOptions $value = null): self
    {
        $this->pricingOptions = $value;
        return $this;
    }

    /**
     * @return ?array<OrderReward>
     */
    public function getRewards(): ?array
    {
        return $this->rewards;
    }

    /**
     * @param ?array<OrderReward> $value
     */
    public function setRewards(?array $value = null): self
    {
        $this->rewards = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getNetAmountDueMoney(): ?Money
    {
        return $this->netAmountDueMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setNetAmountDueMoney(?Money $value = null): self
    {
        $this->netAmountDueMoney = $value;
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
