
# Subscription Event

Describes changes to subscription and billing states.

## Structure

`SubscriptionEvent`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `string` | Required | The ID of the subscription event. | getId(): string | setId(string id): void |
| `subscriptionEventType` | [`string (SubscriptionEventSubscriptionEventType)`](/doc/models/subscription-event-subscription-event-type.md) | Required | The possible subscription event types. | getSubscriptionEventType(): string | setSubscriptionEventType(string subscriptionEventType): void |
| `effectiveDate` | `string` | Required | The date, in YYYY-MM-DD format (for<br>example, 2013-01-15), when the subscription event went into effect. | getEffectiveDate(): string | setEffectiveDate(string effectiveDate): void |
| `planId` | `string` | Required | The ID of the subscription plan associated with the subscription. | getPlanId(): string | setPlanId(string planId): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "subscription_event_type": "PLAN_CHANGE",
  "effective_date": "effective_date0",
  "plan_id": "plan_id8"
}
```

