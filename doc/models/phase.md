
# Phase

Represents a phase, which can override subscription phases as defined by plan_id

## Structure

`Phase`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | id of subscription phase | getUid(): ?string | setUid(?string uid): void |
| `ordinal` | `?int` | Optional | index of phase in total subscription plan | getOrdinal(): ?int | setOrdinal(?int ordinal): void |
| `orderTemplateId` | `?string` | Optional | id of order to be used in billing | getOrderTemplateId(): ?string | setOrderTemplateId(?string orderTemplateId): void |
| `planPhaseUid` | `?string` | Optional | the uid from the plan's phase in catalog | getPlanPhaseUid(): ?string | setPlanPhaseUid(?string planPhaseUid): void |

## Example (as JSON)

```json
{
  "uid": "uid0",
  "ordinal": 80,
  "order_template_id": "order_template_id2",
  "plan_phase_uid": "plan_phase_uid6"
}
```

