
# V1 Cash Drawer Event

V1CashDrawerEvent

## Structure

`V1CashDrawerEvent`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The event's unique ID. | getId(): ?string | setId(?string id): void |
| `employeeId` | `?string` | Optional | The ID of the employee that created the event. | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `eventType` | [`?string (V1CashDrawerEventEventType)`](/doc/models/v1-cash-drawer-event-event-type.md) | Optional | - | getEventType(): ?string | setEventType(?string eventType): void |
| `eventMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getEventMoney(): ?V1Money | setEventMoney(?V1Money eventMoney): void |
| `createdAt` | `?string` | Optional | The time when the event occurred, in ISO 8601 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `description` | `?string` | Optional | An optional description of the event, entered by the employee that created it. | getDescription(): ?string | setDescription(?string description): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "employee_id": "employee_id0",
  "event_type": "OTHER_TENDER_CANCELED_PAYMENT",
  "event_money": {
    "amount": 148,
    "currency_code": "COP"
  },
  "created_at": "created_at2"
}
```

