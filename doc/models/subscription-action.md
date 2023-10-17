
# Subscription Action

Represents an action as a pending change to a subscription.

## Structure

`SubscriptionAction`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The ID of an action scoped to a subscription. | getId(): ?string | setId(?string id): void |
| `type` | [`?string(SubscriptionActionType)`](../../doc/models/subscription-action-type.md) | Optional | Supported types of an action as a pending change to a subscription. | getType(): ?string | setType(?string type): void |
| `effectiveDate` | `?string` | Optional | The `YYYY-MM-DD`-formatted date when the action occurs on the subscription. | getEffectiveDate(): ?string | setEffectiveDate(?string effectiveDate): void |
| `monthlyBillingAnchorDate` | `?int` | Optional | The new billing anchor day value, for a `CHANGE_BILLING_ANCHOR_DATE` action. | getMonthlyBillingAnchorDate(): ?int | setMonthlyBillingAnchorDate(?int monthlyBillingAnchorDate): void |
| `phases` | [`?(Phase[])`](../../doc/models/phase.md) | Optional | A list of Phases, to pass phase-specific information used in the swap. | getPhases(): ?array | setPhases(?array phases): void |
| `newPlanVariationId` | `?string` | Optional | The target subscription plan variation that a subscription switches to, for a `SWAP_PLAN` action. | getNewPlanVariationId(): ?string | setNewPlanVariationId(?string newPlanVariationId): void |

## Example (as JSON)

```json
{
  "id": "id2",
  "type": "SWAP_PLAN",
  "effective_date": "effective_date2",
  "monthly_billing_anchor_date": 18,
  "phases": [
    {
      "uid": "uid0",
      "ordinal": 78,
      "order_template_id": "order_template_id2",
      "plan_phase_uid": "plan_phase_uid6"
    },
    {
      "uid": "uid0",
      "ordinal": 78,
      "order_template_id": "order_template_id2",
      "plan_phase_uid": "plan_phase_uid6"
    }
  ]
}
```

