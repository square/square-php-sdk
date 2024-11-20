
# Catalog Subscription Plan Variation

Describes a subscription plan variation. A subscription plan variation represents how the subscription for a product or service is sold.
For more information, see [Subscription Plans and Variations](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations).

## Structure

`CatalogSubscriptionPlanVariation`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `name` | `string` | Required | The name of the plan variation. | getName(): string | setName(string name): void |
| `phases` | [`SubscriptionPhase[]`](../../doc/models/subscription-phase.md) | Required | A list containing each [SubscriptionPhase](entity:SubscriptionPhase) for this plan variation. | getPhases(): array | setPhases(array phases): void |
| `subscriptionPlanId` | `?string` | Optional | The id of the subscription plan, if there is one. | getSubscriptionPlanId(): ?string | setSubscriptionPlanId(?string subscriptionPlanId): void |
| `monthlyBillingAnchorDate` | `?int` | Optional | The day of the month the billing period starts.<br>**Constraints**: `>= 1`, `<= 31` | getMonthlyBillingAnchorDate(): ?int | setMonthlyBillingAnchorDate(?int monthlyBillingAnchorDate): void |
| `canProrate` | `?bool` | Optional | Whether bills for this plan variation can be split for proration. | getCanProrate(): ?bool | setCanProrate(?bool canProrate): void |
| `successorPlanVariationId` | `?string` | Optional | The ID of a "successor" plan variation to this one. If the field is set, and this object is disabled at all<br>locations, it indicates that this variation is deprecated and the object identified by the successor ID be used in<br>its stead. | getSuccessorPlanVariationId(): ?string | setSuccessorPlanVariationId(?string successorPlanVariationId): void |

## Example (as JSON)

```json
{
  "name": "name2",
  "phases": [
    {
      "uid": "uid0",
      "cadence": "QUARTERLY",
      "periods": 112,
      "recurring_price_money": {
        "amount": 66,
        "currency": "ZMW"
      },
      "ordinal": 78,
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
  ],
  "subscription_plan_id": "subscription_plan_id0",
  "monthly_billing_anchor_date": 38,
  "can_prorate": false,
  "successor_plan_variation_id": "successor_plan_variation_id2"
}
```

