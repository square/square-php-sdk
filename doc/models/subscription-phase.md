
# Subscription Phase

Describes a phase in a subscription plan variation. For more information, see [Subscription Plans and Variations](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations).

## Structure

`SubscriptionPhase`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | The Square-assigned ID of the subscription phase. This field cannot be changed after a `SubscriptionPhase` is created. | getUid(): ?string | setUid(?string uid): void |
| `cadence` | [`string(SubscriptionCadence)`](../../doc/models/subscription-cadence.md) | Required | Determines the billing cadence of a [Subscription](../../doc/models/subscription.md) | getCadence(): string | setCadence(string cadence): void |
| `periods` | `?int` | Optional | The number of `cadence`s the phase lasts. If not set, the phase never ends. Only the last phase can be indefinite. This field cannot be changed after a `SubscriptionPhase` is created. | getPeriods(): ?int | setPeriods(?int periods): void |
| `recurringPriceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getRecurringPriceMoney(): ?Money | setRecurringPriceMoney(?Money recurringPriceMoney): void |
| `ordinal` | `?int` | Optional | The position this phase appears in the sequence of phases defined for the plan, indexed from 0. This field cannot be changed after a `SubscriptionPhase` is created. | getOrdinal(): ?int | setOrdinal(?int ordinal): void |
| `pricing` | [`?SubscriptionPricing`](../../doc/models/subscription-pricing.md) | Optional | Describes the pricing for the subscription. | getPricing(): ?SubscriptionPricing | setPricing(?SubscriptionPricing pricing): void |

## Example (as JSON)

```json
{
  "uid": "uid2",
  "cadence": "EVERY_SIX_MONTHS",
  "periods": 36,
  "recurring_price_money": {
    "amount": 66,
    "currency": "ZMW"
  },
  "ordinal": 2,
  "pricing": {
    "type": "STATIC",
    "discount_ids": [
      "discount_ids5",
      "discount_ids6"
    ],
    "price_money": {
      "amount": 202,
      "currency": "GTQ"
    }
  }
}
```

