<?php

namespace Square\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Money;
use Square\Types\SubscriptionSource;
use Square\Types\Phase;
use Square\Core\Types\ArrayType;

class CreateSubscriptionRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreateSubscription` request.
     * If you do not provide a unique string (or provide an empty string as the value),
     * the endpoint treats each request as independent.
     *
     * For more information, see [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var string $locationId The ID of the location the subscription is associated with.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var ?string $planVariationId The ID of the [subscription plan variation](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations#plan-variations) created using the Catalog API.
     */
    #[JsonProperty('plan_variation_id')]
    private ?string $planVariationId;

    /**
     * @var string $customerId The ID of the [customer](entity:Customer) subscribing to the subscription plan variation.
     */
    #[JsonProperty('customer_id')]
    private string $customerId;

    /**
     * The `YYYY-MM-DD`-formatted date to start the subscription.
     * If it is unspecified, the subscription starts immediately.
     *
     * @var ?string $startDate
     */
    #[JsonProperty('start_date')]
    private ?string $startDate;

    /**
     * The `YYYY-MM-DD`-formatted date when the newly created subscription is scheduled for cancellation.
     *
     * This date overrides the cancellation date set in the plan variation configuration.
     * If the cancellation date is earlier than the end date of a subscription cycle, the subscription stops
     * at the canceled date and the subscriber is sent a prorated invoice at the beginning of the canceled cycle.
     *
     * When the subscription plan of the newly created subscription has a fixed number of cycles and the `canceled_date`
     * occurs before the subscription plan expires, the specified `canceled_date` sets the date when the subscription
     * stops through the end of the last cycle.
     *
     * @var ?string $canceledDate
     */
    #[JsonProperty('canceled_date')]
    private ?string $canceledDate;

    /**
     * The tax to add when billing the subscription.
     * The percentage is expressed in decimal form, using a `'.'` as the decimal
     * separator and without a `'%'` sign. For example, a value of 7.5
     * corresponds to 7.5%.
     *
     * @var ?string $taxPercentage
     */
    #[JsonProperty('tax_percentage')]
    private ?string $taxPercentage;

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
     * The ID of the [subscriber's](entity:Customer) [card](entity:Card) to charge.
     * If it is not specified, the subscriber receives an invoice via email with a link to pay for their subscription.
     *
     * @var ?string $cardId
     */
    #[JsonProperty('card_id')]
    private ?string $cardId;

    /**
     * The timezone that is used in date calculations for the subscription. If unset, defaults to
     * the location timezone. If a timezone is not configured for the location, defaults to "America/New_York".
     * Format: the IANA Timezone Database identifier for the location timezone. For
     * a list of time zones, see [List of tz database time zones](https://en.wikipedia.org/wiki/List_of_tz_database_time_zones).
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
     * @var ?int $monthlyBillingAnchorDate The day-of-the-month to change the billing date to.
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
     *   locationId: string,
     *   customerId: string,
     *   idempotencyKey?: ?string,
     *   planVariationId?: ?string,
     *   startDate?: ?string,
     *   canceledDate?: ?string,
     *   taxPercentage?: ?string,
     *   priceOverrideMoney?: ?Money,
     *   cardId?: ?string,
     *   timezone?: ?string,
     *   source?: ?SubscriptionSource,
     *   monthlyBillingAnchorDate?: ?int,
     *   phases?: ?array<Phase>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->locationId = $values['locationId'];
        $this->planVariationId = $values['planVariationId'] ?? null;
        $this->customerId = $values['customerId'];
        $this->startDate = $values['startDate'] ?? null;
        $this->canceledDate = $values['canceledDate'] ?? null;
        $this->taxPercentage = $values['taxPercentage'] ?? null;
        $this->priceOverrideMoney = $values['priceOverrideMoney'] ?? null;
        $this->cardId = $values['cardId'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->monthlyBillingAnchorDate = $values['monthlyBillingAnchorDate'] ?? null;
        $this->phases = $values['phases'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
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
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
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
}
