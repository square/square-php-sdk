
# V1 Cash Drawer Shift

Contains details for a single cash drawer shift.

## Structure

`V1CashDrawerShift`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The shift's unique ID. | getId(): ?string | setId(?string id): void |
| `eventType` | [`?string (V1CashDrawerShiftEventType)`](/doc/models/v1-cash-drawer-shift-event-type.md) | Optional | - | getEventType(): ?string | setEventType(?string eventType): void |
| `openedAt` | `?string` | Optional | The time when the shift began, in ISO 8601 format. | getOpenedAt(): ?string | setOpenedAt(?string openedAt): void |
| `endedAt` | `?string` | Optional | The time when the shift ended, in ISO 8601 format. | getEndedAt(): ?string | setEndedAt(?string endedAt): void |
| `closedAt` | `?string` | Optional | The time when the shift was closed, in ISO 8601 format. | getClosedAt(): ?string | setClosedAt(?string closedAt): void |
| `employeeIds` | `?(string[])` | Optional | The IDs of all employees that were logged into Square Register at some point during the cash drawer shift. | getEmployeeIds(): ?array | setEmployeeIds(?array employeeIds): void |
| `openingEmployeeId` | `?string` | Optional | The ID of the employee that started the cash drawer shift. | getOpeningEmployeeId(): ?string | setOpeningEmployeeId(?string openingEmployeeId): void |
| `endingEmployeeId` | `?string` | Optional | The ID of the employee that ended the cash drawer shift. | getEndingEmployeeId(): ?string | setEndingEmployeeId(?string endingEmployeeId): void |
| `closingEmployeeId` | `?string` | Optional | The ID of the employee that closed the cash drawer shift by auditing the cash drawer's contents. | getClosingEmployeeId(): ?string | setClosingEmployeeId(?string closingEmployeeId): void |
| `description` | `?string` | Optional | A description of the cash drawer shift. | getDescription(): ?string | setDescription(?string description): void |
| `startingCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getStartingCashMoney(): ?V1Money | setStartingCashMoney(?V1Money startingCashMoney): void |
| `cashPaymentMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getCashPaymentMoney(): ?V1Money | setCashPaymentMoney(?V1Money cashPaymentMoney): void |
| `cashRefundsMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getCashRefundsMoney(): ?V1Money | setCashRefundsMoney(?V1Money cashRefundsMoney): void |
| `cashPaidInMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getCashPaidInMoney(): ?V1Money | setCashPaidInMoney(?V1Money cashPaidInMoney): void |
| `cashPaidOutMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getCashPaidOutMoney(): ?V1Money | setCashPaidOutMoney(?V1Money cashPaidOutMoney): void |
| `expectedCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getExpectedCashMoney(): ?V1Money | setExpectedCashMoney(?V1Money expectedCashMoney): void |
| `closedCashMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getClosedCashMoney(): ?V1Money | setClosedCashMoney(?V1Money closedCashMoney): void |
| `device` | [`?Device`](/doc/models/device.md) | Optional | - | getDevice(): ?Device | setDevice(?Device device): void |
| `events` | [`?(V1CashDrawerEvent[])`](/doc/models/v1-cash-drawer-event.md) | Optional | All of the events (payments, refunds, and so on) that involved the cash drawer during the shift. | getEvents(): ?array | setEvents(?array events): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "event_type": "ENDED",
  "opened_at": "opened_at8",
  "ended_at": "ended_at2",
  "closed_at": "closed_at2"
}
```

