
# Subscription

Represents a subscription to a subscription plan by a subscriber.

For an overview of the `Subscription` type, see
[Subscription object](https://developer.squareup.com/docs/subscriptions-api/overview#subscription-object-overview).

## Structure

`Subscription`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the subscription.<br>**Constraints**: *Maximum Length*: `255` | getId(): ?string | setId(?string id): void |
| `locationId` | `?string` | Optional | The ID of the location associated with the subscription. | getLocationId(): ?string | setLocationId(?string locationId): void |
| `planId` | `?string` | Optional | The ID of the subscribed-to [subscription plan](../../doc/models/catalog-subscription-plan.md). | getPlanId(): ?string | setPlanId(?string planId): void |
| `customerId` | `?string` | Optional | The ID of the subscribing [customer](../../doc/models/customer.md) profile. | getCustomerId(): ?string | setCustomerId(?string customerId): void |
| `startDate` | `?string` | Optional | The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to start the subscription. | getStartDate(): ?string | setStartDate(?string startDate): void |
| `canceledDate` | `?string` | Optional | The `YYYY-MM-DD`-formatted date (for example, 2013-01-15) to cancel the subscription,<br>when the subscription status changes to `CANCELED` and the subscription billing stops.<br><br>If this field is not set, the subscription ends according its subscription plan.<br><br>This field cannot be updated, other than being cleared. | getCanceledDate(): ?string | setCanceledDate(?string canceledDate): void |
| `chargedThroughDate` | `?string` | Optional | The `YYYY-MM-DD`-formatted date up to when the subscriber is invoiced for the<br>subscription.<br><br>After the invoice is sent for a given billing period,<br>this date will be the last day of the billing period.<br>For example,<br>suppose for the month of May a subscriber gets an invoice<br>(or charged the card) on May 1. For the monthly billing scenario,<br>this date is then set to May 31. | getChargedThroughDate(): ?string | setChargedThroughDate(?string chargedThroughDate): void |
| `status` | [`?string (SubscriptionStatus)`](../../doc/models/subscription-status.md) | Optional | Supported subscription statuses. | getStatus(): ?string | setStatus(?string status): void |
| `taxPercentage` | `?string` | Optional | The tax amount applied when billing the subscription. The<br>percentage is expressed in decimal form, using a `'.'` as the decimal<br>separator and without a `'%'` sign. For example, a value of `7.5`<br>corresponds to 7.5%. | getTaxPercentage(): ?string | setTaxPercentage(?string taxPercentage): void |
| `invoiceIds` | `?(string[])` | Optional | The IDs of the [invoices](../../doc/models/invoice.md) created for the<br>subscription, listed in order when the invoices were created<br>(newest invoices appear first). | getInvoiceIds(): ?array | setInvoiceIds(?array invoiceIds): void |
| `priceOverrideMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getPriceOverrideMoney(): ?Money | setPriceOverrideMoney(?Money priceOverrideMoney): void |
| `version` | `?int` | Optional | The version of the object. When updating an object, the version<br>supplied must match the version in the database, otherwise the write will<br>be rejected as conflicting. | getVersion(): ?int | setVersion(?int version): void |
| `createdAt` | `?string` | Optional | The timestamp when the subscription was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `cardId` | `?string` | Optional | The ID of the [subscriber's](../../doc/models/customer.md) [card](../../doc/models/card.md)<br>used to charge for the subscription. | getCardId(): ?string | setCardId(?string cardId): void |
| `timezone` | `?string` | Optional | Timezone that will be used in date calculations for the subscription.<br>Defaults to the timezone of the location based on `location_id`.<br>Format: the IANA Timezone Database identifier for the location timezone (for example, `America/Los_Angeles`). | getTimezone(): ?string | setTimezone(?string timezone): void |
| `source` | [`?SubscriptionSource`](../../doc/models/subscription-source.md) | Optional | The origination details of the subscription. | getSource(): ?SubscriptionSource | setSource(?SubscriptionSource source): void |
| `actions` | [`?(SubscriptionAction[])`](../../doc/models/subscription-action.md) | Optional | The list of scheduled actions on this subscription. It is set only in the response from  <br>[RetrieveSubscription](../../doc/apis/subscriptions.md#retrieve-subscription) with the query parameter<br>of `include=actions` or from<br>[SearchSubscriptions](../../doc/apis/subscriptions.md#search-subscriptions) with the input parameter<br>of `include:["actions"]`. | getActions(): ?array | setActions(?array actions): void |

## Example (as JSON)

```json
{
  "canceled_date": null,
  "status": null,
  "tax_percentage": null,
  "price_override_money": null,
  "version": null,
  "card_id": null,
  "source": null,
  "actions": null
}
```

