<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a subscription purchased by a customer.
 *
 * For more information, see
 * [Manage Subscriptions](https://developer.squareup.com/docs/subscriptions-api/manage-subscriptions).
 */
class Subscription extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the subscription.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $locationId The ID of the location associated with the subscription.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $planVariationId The ID of the subscribed-to [subscription plan variation](entity:CatalogSubscriptionPlanVariation).
     */
    #[JsonProperty('plan_variation_id')]
    private ?string $planVariationId;

    /**
     * @var ?string $customerId The ID of the subscribing [customer](entity:Customer) profile.
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @var ?string $startDate The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to start the subscription.
     */
    #[JsonProperty('start_date')]
    private ?string $startDate;

    /**
     * The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to cancel the subscription,
     * when the subscription status changes to `CANCELED` and the subscription billing stops.
     *
     * If this field is not set, the subscription ends according its subscription plan.
     *
     * This field cannot be updated, other than being cleared.
     *
     * @var ?string $canceledDate
     */
    #[JsonProperty('canceled_date')]
    private ?string $canceledDate;

    /**
     * The `YYYY-MM-DD`-formatted date up to when the subscriber is invoiced for the
     * subscription.
     *
     * After the invoice is sent for a given billing period,
     * this date will be the last day of the billing period.
     * For example,
     * suppose for the month of May a subscriber gets an invoice
     * (or charged the card) on May 1. For the monthly billing scenario,
     * this date is then set to May 31.
     *
     * @var ?string $chargedThroughDate
     */
    #[JsonProperty('charged_through_date')]
    private ?string $chargedThroughDate;

    /**
     * The current status of the subscription.
     * See [SubscriptionStatus](#type-subscriptionstatus) for possible values
     *
     * @var ?value-of<SubscriptionStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The tax amount applied when billing the subscription. The
     * percentage is expressed in decimal form, using a `'.'` as the decimal
     * separator and without a `'%'` sign. For example, a value of `7.5`
     * corresponds to 7.5%.
     *
     * @var ?string $taxPercentage
     */
    #[JsonProperty('tax_percentage')]
    private ?string $taxPercentage;

    /**
     * The IDs of the [invoices](entity:Invoice) created for the
     * subscription, listed in order when the invoices were created
     * (newest invoices appear first).
     *
     * @var ?array<string> $invoiceIds
     */
    #[JsonProperty('invoice_ids'), ArrayType(['string'])]
    private ?array $invoiceIds;

    /**
     * A custom price which overrides the cost of a subscription plan variation with `STATIC` pricing.
     * This field does not affect itemized subscriptions with `RELATIVE` pricing. Instead,
     * you should edit the Subscription's [order template](https://developer.squareup.com/docs/subscriptions-api/manage-subscriptions#phases-and-order-templates).
     *
     * @var ?Money $priceOverrideMoney
     */
    #[JsonProperty('price_override_money')]
    private ?Money $priceOverrideMoney;

    /**
     * The version of the object. When updating an object, the version
     * supplied must match the version in the database, otherwise the write will
     * be rejected as conflicting.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt The timestamp when the subscription was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The ID of the [subscriber's](entity:Customer) [card](entity:Card)
     * used to charge for the subscription.
     *
     * @var ?string $cardId
     */
    #[JsonProperty('card_id')]
    private ?string $cardId;

    /**
     * Timezone that will be used in date calculations for the subscription.
     * Defaults to the timezone of the location based on `location_id`.
     * Format: the IANA Timezone Database identifier for the location timezone (for example, `America/Los_Angeles`).
     *
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * @var ?SubscriptionSource $source The origination details of the subscription.
     */
    #[JsonProperty('source')]
    private ?SubscriptionSource $source;

    /**
     * The list of scheduled actions on this subscription. It is set only in the response from
     * [RetrieveSubscription](api-endpoint:Subscriptions-RetrieveSubscription) with the query parameter
     * of `include=actions` or from
     * [SearchSubscriptions](api-endpoint:Subscriptions-SearchSubscriptions) with the input parameter
     * of `include:["actions"]`.
     *
     * @var ?array<SubscriptionAction> $actions
     */
    #[JsonProperty('actions'), ArrayType([SubscriptionAction::class])]
    private ?array $actions;

    /**
     * @var ?int $monthlyBillingAnchorDate The day of the month on which the subscription will issue invoices and publish orders.
     */
    #[JsonProperty('monthly_billing_anchor_date')]
    private ?int $monthlyBillingAnchorDate;

    /**
     * @var ?array<Phase> $phases array of phases for this subscription
     */
    #[JsonProperty('phases'), ArrayType([Phase::class])]
    private ?array $phases;

    /**
     * @param array{
     *   id?: ?string,
     *   locationId?: ?string,
     *   planVariationId?: ?string,
     *   customerId?: ?string,
     *   startDate?: ?string,
     *   canceledDate?: ?string,
     *   chargedThroughDate?: ?string,
     *   status?: ?value-of<SubscriptionStatus>,
     *   taxPercentage?: ?string,
     *   invoiceIds?: ?array<string>,
     *   priceOverrideMoney?: ?Money,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   cardId?: ?string,
     *   timezone?: ?string,
     *   source?: ?SubscriptionSource,
     *   actions?: ?array<SubscriptionAction>,
     *   monthlyBillingAnchorDate?: ?int,
     *   phases?: ?array<Phase>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->planVariationId = $values['planVariationId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->canceledDate = $values['canceledDate'] ?? null;
        $this->chargedThroughDate = $values['chargedThroughDate'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->taxPercentage = $values['taxPercentage'] ?? null;
        $this->invoiceIds = $values['invoiceIds'] ?? null;
        $this->priceOverrideMoney = $values['priceOverrideMoney'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->cardId = $values['cardId'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->actions = $values['actions'] ?? null;
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->phases = $values['phases'] ?? null;
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
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPlanVariationId(): ?string
    {
        return $this->planVariationId;
    }

    /**
     * @param ?string $value
     */
    public function setPlanVariationId(?string $value = null): self
    {
        $this->planVariationId = $value;
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
     * @return ?string
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * @param ?string $value
     */
    public function setStartDate(?string $value = null): self
    {
        $this->startDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCanceledDate(): ?string
    {
        return $this->canceledDate;
    }

    /**
     * @param ?string $value
     */
    public function setCanceledDate(?string $value = null): self
    {
        $this->canceledDate = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getChargedThroughDate(): ?string
    {
        return $this->chargedThroughDate;
    }

    /**
     * @param ?string $value
     */
    public function setChargedThroughDate(?string $value = null): self
    {
        $this->chargedThroughDate = $value;
        return $this;
    }

    /**
     * @return ?value-of<SubscriptionStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<SubscriptionStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTaxPercentage(): ?string
    {
        return $this->taxPercentage;
    }

    /**
     * @param ?string $value
     */
    public function setTaxPercentage(?string $value = null): self
    {
        $this->taxPercentage = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoiceIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setInvoiceIds(?array $value = null): self
    {
        $this->invoiceIds = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getPriceOverrideMoney(): ?Money
    {
        return $this->priceOverrideMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setPriceOverrideMoney(?Money $value = null): self
    {
        $this->priceOverrideMoney = $value;
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
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * @param ?string $value
     */
    public function setCardId(?string $value = null): self
    {
        $this->cardId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
        return $this;
    }

    /**
     * @return ?SubscriptionSource
     */
    public function getSource(): ?SubscriptionSource
    {
        return $this->source;
    }

    /**
     * @param ?SubscriptionSource $value
     */
    public function setSource(?SubscriptionSource $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?array<SubscriptionAction>
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * @param ?array<SubscriptionAction> $value
     */
    public function setActions(?array $value = null): self
    {
        $this->actions = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMonthlyBillingAnchorDate(): ?int
    {
        return $this->monthlyBillingAnchorDate;
    }

    /**
     * @param ?int $value
     */
    public function setMonthlyBillingAnchorDate(?int $value = null): self
    {
        $this->monthlyBillingAnchorDate = $value;
        return $this;
    }

    /**
     * @return ?array<Phase>
     */
    public function getPhases(): ?array
    {
        return $this->phases;
    }

    /**
     * @param ?array<Phase> $value
     */
    public function setPhases(?array $value = null): self
    {
        $this->phases = $value;
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
