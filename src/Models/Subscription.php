<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a subscription to a subscription plan by a subscriber.
 *
 * For an overview of the `Subscription` type, see
 * [Subscription object](https://developer.squareup.com/docs/subscriptions-api/overview#subscription-
 * object-overview).
 */
class Subscription implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $planId;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $startDate;

    /**
     * @var string|null
     */
    private $canceledDate;

    /**
     * @var string|null
     */
    private $chargedThroughDate;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $taxPercentage;

    /**
     * @var string[]|null
     */
    private $invoiceIds;

    /**
     * @var Money|null
     */
    private $priceOverrideMoney;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $cardId;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var SubscriptionSource|null
     */
    private $source;

    /**
     * @var SubscriptionAction[]|null
     */
    private $actions;

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the subscription.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the subscription.
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
     * The ID of the location associated with the subscription.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location associated with the subscription.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Plan Id.
     *
     * The ID of the subscribed-to [subscription plan]($m/CatalogSubscriptionPlan).
     */
    public function getPlanId(): ?string
    {
        return $this->planId;
    }

    /**
     * Sets Plan Id.
     *
     * The ID of the subscribed-to [subscription plan]($m/CatalogSubscriptionPlan).
     *
     * @maps plan_id
     */
    public function setPlanId(?string $planId): void
    {
        $this->planId = $planId;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the subscribing [customer]($m/Customer) profile.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the subscribing [customer]($m/Customer) profile.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Start Date.
     *
     * The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to start the subscription.
     */
    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    /**
     * Sets Start Date.
     *
     * The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to start the subscription.
     *
     * @maps start_date
     */
    public function setStartDate(?string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns Canceled Date.
     *
     * The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to cancel the subscription,
     * when the subscription status changes to `CANCELED` and the subscription billing stops.
     *
     * If this field is not set, the subscription ends according its subscription plan.
     *
     * This field cannot be updated, other than being cleared.
     */
    public function getCanceledDate(): ?string
    {
        return $this->canceledDate;
    }

    /**
     * Sets Canceled Date.
     *
     * The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to cancel the subscription,
     * when the subscription status changes to `CANCELED` and the subscription billing stops.
     *
     * If this field is not set, the subscription ends according its subscription plan.
     *
     * This field cannot be updated, other than being cleared.
     *
     * @maps canceled_date
     */
    public function setCanceledDate(?string $canceledDate): void
    {
        $this->canceledDate = $canceledDate;
    }

    /**
     * Returns Charged Through Date.
     *
     * The `YYYY-MM-DD`-formatted date up to when the subscriber is invoiced for the
     * subscription.
     *
     * After the invoice is sent for a given billing period,
     * this date will be the last day of the billing period.
     * For example,
     * suppose for the month of May a subscriber gets an invoice
     * (or charged the card) on May 1. For the monthly billing scenario,
     * this date is then set to May 31.
     */
    public function getChargedThroughDate(): ?string
    {
        return $this->chargedThroughDate;
    }

    /**
     * Sets Charged Through Date.
     *
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
     * @maps charged_through_date
     */
    public function setChargedThroughDate(?string $chargedThroughDate): void
    {
        $this->chargedThroughDate = $chargedThroughDate;
    }

    /**
     * Returns Status.
     *
     * Supported subscription statuses.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Supported subscription statuses.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Tax Percentage.
     *
     * The tax amount applied when billing the subscription. The
     * percentage is expressed in decimal form, using a `'.'` as the decimal
     * separator and without a `'%'` sign. For example, a value of `7.5`
     * corresponds to 7.5%.
     */
    public function getTaxPercentage(): ?string
    {
        return $this->taxPercentage;
    }

    /**
     * Sets Tax Percentage.
     *
     * The tax amount applied when billing the subscription. The
     * percentage is expressed in decimal form, using a `'.'` as the decimal
     * separator and without a `'%'` sign. For example, a value of `7.5`
     * corresponds to 7.5%.
     *
     * @maps tax_percentage
     */
    public function setTaxPercentage(?string $taxPercentage): void
    {
        $this->taxPercentage = $taxPercentage;
    }

    /**
     * Returns Invoice Ids.
     *
     * The IDs of the [invoices]($m/Invoice) created for the
     * subscription, listed in order when the invoices were created
     * (oldest invoices appear first).
     *
     * @return string[]|null
     */
    public function getInvoiceIds(): ?array
    {
        return $this->invoiceIds;
    }

    /**
     * Sets Invoice Ids.
     *
     * The IDs of the [invoices]($m/Invoice) created for the
     * subscription, listed in order when the invoices were created
     * (oldest invoices appear first).
     *
     * @maps invoice_ids
     *
     * @param string[]|null $invoiceIds
     */
    public function setInvoiceIds(?array $invoiceIds): void
    {
        $this->invoiceIds = $invoiceIds;
    }

    /**
     * Returns Price Override Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getPriceOverrideMoney(): ?Money
    {
        return $this->priceOverrideMoney;
    }

    /**
     * Sets Price Override Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps price_override_money
     */
    public function setPriceOverrideMoney(?Money $priceOverrideMoney): void
    {
        $this->priceOverrideMoney = $priceOverrideMoney;
    }

    /**
     * Returns Version.
     *
     * The version of the object. When updating an object, the version
     * supplied must match the version in the database, otherwise the write will
     * be rejected as conflicting.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the object. When updating an object, the version
     * supplied must match the version in the database, otherwise the write will
     * be rejected as conflicting.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the subscription was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the subscription was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Card Id.
     *
     * The ID of the [subscriber's]($m/Customer) [card]($m/Card)
     * used to charge for the subscription.
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * Sets Card Id.
     *
     * The ID of the [subscriber's]($m/Customer) [card]($m/Card)
     * used to charge for the subscription.
     *
     * @maps card_id
     */
    public function setCardId(?string $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * Returns Timezone.
     *
     * Timezone that will be used in date calculations for the subscription.
     * Defaults to the timezone of the location based on `location_id`.
     * Format: the IANA Timezone Database identifier for the location timezone (for example,
     * `America/Los_Angeles`).
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * Timezone that will be used in date calculations for the subscription.
     * Defaults to the timezone of the location based on `location_id`.
     * Format: the IANA Timezone Database identifier for the location timezone (for example,
     * `America/Los_Angeles`).
     *
     * @maps timezone
     */
    public function setTimezone(?string $timezone): void
    {
        $this->timezone = $timezone;
    }

    /**
     * Returns Source.
     *
     * The origination details of the subscription.
     */
    public function getSource(): ?SubscriptionSource
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * The origination details of the subscription.
     *
     * @maps source
     */
    public function setSource(?SubscriptionSource $source): void
    {
        $this->source = $source;
    }

    /**
     * Returns Actions.
     *
     * The list of scheduled actions on this subscription. It is set only in the response from
     * [RetrieveSubscription]($e/Subscriptions/RetrieveSubscription) with the query parameter
     * of `include=actions` or from
     * [SearchSubscriptions]($e/Subscriptions/SearchSubscriptions) with the input parameter
     * of `include:["actions"]`.
     *
     * @return SubscriptionAction[]|null
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * Sets Actions.
     *
     * The list of scheduled actions on this subscription. It is set only in the response from
     * [RetrieveSubscription]($e/Subscriptions/RetrieveSubscription) with the query parameter
     * of `include=actions` or from
     * [SearchSubscriptions]($e/Subscriptions/SearchSubscriptions) with the input parameter
     * of `include:["actions"]`.
     *
     * @maps actions
     *
     * @param SubscriptionAction[]|null $actions
     */
    public function setActions(?array $actions): void
    {
        $this->actions = $actions;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                   = $this->id;
        }
        if (isset($this->locationId)) {
            $json['location_id']          = $this->locationId;
        }
        if (isset($this->planId)) {
            $json['plan_id']              = $this->planId;
        }
        if (isset($this->customerId)) {
            $json['customer_id']          = $this->customerId;
        }
        if (isset($this->startDate)) {
            $json['start_date']           = $this->startDate;
        }
        if (isset($this->canceledDate)) {
            $json['canceled_date']        = $this->canceledDate;
        }
        if (isset($this->chargedThroughDate)) {
            $json['charged_through_date'] = $this->chargedThroughDate;
        }
        if (isset($this->status)) {
            $json['status']               = $this->status;
        }
        if (isset($this->taxPercentage)) {
            $json['tax_percentage']       = $this->taxPercentage;
        }
        if (isset($this->invoiceIds)) {
            $json['invoice_ids']          = $this->invoiceIds;
        }
        if (isset($this->priceOverrideMoney)) {
            $json['price_override_money'] = $this->priceOverrideMoney;
        }
        if (isset($this->version)) {
            $json['version']              = $this->version;
        }
        if (isset($this->createdAt)) {
            $json['created_at']           = $this->createdAt;
        }
        if (isset($this->cardId)) {
            $json['card_id']              = $this->cardId;
        }
        if (isset($this->timezone)) {
            $json['timezone']             = $this->timezone;
        }
        if (isset($this->source)) {
            $json['source']               = $this->source;
        }
        if (isset($this->actions)) {
            $json['actions']              = $this->actions;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
