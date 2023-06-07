
# Swap Plan Request

Defines input parameters in a call to the
[SwapPlan](../../doc/apis/subscriptions.md#swap-plan) endpoint.

## Structure

`SwapPlanRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `newPlanVariationId` | `?string` | Optional | The ID of the new subscription plan variation.<br><br>This field is required. | getNewPlanVariationId(): ?string | setNewPlanVariationId(?string newPlanVariationId): void |
| `phases` | [`?(PhaseInput[])`](../../doc/models/phase-input.md) | Optional | A list of PhaseInputs, to pass phase-specific information used in the swap. | getPhases(): ?array | setPhases(?array phases): void |

## Example (as JSON)

```json
{
  "new_plan_variation_id": "new_plan_variation_id0",
  "phases": [
    {
      "ordinal": 207,
      "order_template_id": "order_template_id7"
    },
    {
      "ordinal": 208,
      "order_template_id": "order_template_id8"
    }
  ]
}
```

