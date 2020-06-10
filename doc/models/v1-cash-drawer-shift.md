## V1 Cash Drawer Shift

Contains details for a single cash drawer shift.

### Structure

`V1CashDrawerShift`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The shift's unique ID. |
| `eventType` | [`?string (V1CashDrawerShiftEventType)`](/doc/models/v1-cash-drawer-shift-event-type.md) | Optional | -  |
| `openedAt` | `?string` | Optional | The time when the shift began, in ISO 8601 format. |
| `endedAt` | `?string` | Optional | The time when the shift ended, in ISO 8601 format. |
| `closedAt` | `?string` | Optional | The time when the shift was closed, in ISO 8601 format. |
| `employeeIds` | `?(string[])` | Optional | The IDs of all employees that were logged into Square Register at some point during the cash drawer shift. |
| `openingEmployeeId` | `?string` | Optional | The ID of the employee that started the cash drawer shift. |
| `endingEmployeeId` | `?string` | Optional | The ID of the employee that ended the cash drawer shift. |
| `closingEmployeeId` | `?string` | Optional | The ID of the employee that closed the cash drawer shift by auditing the cash drawer's contents. |
| `description` | `?string` | Optional | A description of the cash drawer shift. |
| `startingCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `cashPaymentMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `cashRefundsMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `cashPaidInMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `cashPaidOutMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `expectedCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `closedCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | -  |
| `device` | [`?Device`](/doc/models/device.md) | Optional | -  |
| `events` | [`?(V1CashDrawerEvent[])`](/doc/models/v1-cash-drawer-event.md) | Optional | All of the events (payments, refunds, and so on) that involved the cash drawer during the shift. |

### Example (as JSON)

```json
{
  "id": null,
  "event_type": null,
  "opened_at": null,
  "ended_at": null,
  "closed_at": null,
  "employee_ids": null,
  "opening_employee_id": null,
  "ending_employee_id": null,
  "closing_employee_id": null,
  "description": null,
  "starting_cash_money": null,
  "cash_payment_money": null,
  "cash_refunds_money": null,
  "cash_paid_in_money": null,
  "cash_paid_out_money": null,
  "expected_cash_money": null,
  "closed_cash_money": null,
  "device": null,
  "events": null
}
```

