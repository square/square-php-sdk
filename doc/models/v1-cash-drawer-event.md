## V1 Cash Drawer Event

V1CashDrawerEvent

### Structure

`V1CashDrawerEvent`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The event's unique ID. |
| `employeeId` | `?string` | Optional | The ID of the employee that created the event. |
| `eventType` | [`?string (V1CashDrawerEventEventType)`](/doc/models/v1-cash-drawer-event-event-type.md) | Optional | -  |
| `eventMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `createdAt` | `?string` | Optional | The time when the event occurred, in ISO 8601 format. |
| `description` | `?string` | Optional | An optional description of the event, entered by the employee that created it. |

### Example (as JSON)

```json
{
  "id": null,
  "employee_id": null,
  "event_type": null,
  "event_money": null,
  "created_at": null,
  "description": null
}
```

