
# Phase Input

Represents the arguments used to construct a new phase.

## Structure

`PhaseInput`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `ordinal` | `int` | Required | index of phase in total subscription plan | getOrdinal(): int | setOrdinal(int ordinal): void |
| `orderTemplateId` | `?string` | Optional | id of order to be used in billing | getOrderTemplateId(): ?string | setOrderTemplateId(?string orderTemplateId): void |

## Example (as JSON)

```json
{
  "ordinal": 234,
  "order_template_id": "order_template_id4"
}
```

