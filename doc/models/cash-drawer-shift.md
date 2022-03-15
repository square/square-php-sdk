
# Cash Drawer Shift

This model gives the details of a cash drawer shift.
The cash_payment_money, cash_refund_money, cash_paid_in_money,
and cash_paid_out_money fields are all computed by summing their respective
event types.

## Structure

`CashDrawerShift`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The shift unique ID. | getId(): ?string | setId(?string id): void |
| `state` | [`?string (CashDrawerShiftState)`](../../doc/models/cash-drawer-shift-state.md) | Optional | The current state of a cash drawer shift. | getState(): ?string | setState(?string state): void |
| `openedAt` | `?string` | Optional | The time when the shift began, in ISO 8601 format. | getOpenedAt(): ?string | setOpenedAt(?string openedAt): void |
| `endedAt` | `?string` | Optional | The time when the shift ended, in ISO 8601 format. | getEndedAt(): ?string | setEndedAt(?string endedAt): void |
| `closedAt` | `?string` | Optional | The time when the shift was closed, in ISO 8601 format. | getClosedAt(): ?string | setClosedAt(?string closedAt): void |
| `employeeIds` | `?(string[])` | Optional | The IDs of all employees that were logged into Square Point of Sale at any<br>point while the cash drawer shift was open. | getEmployeeIds(): ?array | setEmployeeIds(?array employeeIds): void |
| `openingEmployeeId` | `?string` | Optional | The ID of the employee that started the cash drawer shift. | getOpeningEmployeeId(): ?string | setOpeningEmployeeId(?string openingEmployeeId): void |
| `endingEmployeeId` | `?string` | Optional | The ID of the employee that ended the cash drawer shift. | getEndingEmployeeId(): ?string | setEndingEmployeeId(?string endingEmployeeId): void |
| `closingEmployeeId` | `?string` | Optional | The ID of the employee that closed the cash drawer shift by auditing<br>the cash drawer contents. | getClosingEmployeeId(): ?string | setClosingEmployeeId(?string closingEmployeeId): void |
| `description` | `?string` | Optional | The free-form text description of a cash drawer by an employee. | getDescription(): ?string | setDescription(?string description): void |
| `openedCashMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getOpenedCashMoney(): ?Money | setOpenedCashMoney(?Money openedCashMoney): void |
| `cashPaymentMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getCashPaymentMoney(): ?Money | setCashPaymentMoney(?Money cashPaymentMoney): void |
| `cashRefundsMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getCashRefundsMoney(): ?Money | setCashRefundsMoney(?Money cashRefundsMoney): void |
| `cashPaidInMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getCashPaidInMoney(): ?Money | setCashPaidInMoney(?Money cashPaidInMoney): void |
| `cashPaidOutMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getCashPaidOutMoney(): ?Money | setCashPaidOutMoney(?Money cashPaidOutMoney): void |
| `expectedCashMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getExpectedCashMoney(): ?Money | setExpectedCashMoney(?Money expectedCashMoney): void |
| `closedCashMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getClosedCashMoney(): ?Money | setClosedCashMoney(?Money closedCashMoney): void |
| `device` | [`?CashDrawerDevice`](../../doc/models/cash-drawer-device.md) | Optional | - | getDevice(): ?CashDrawerDevice | setDevice(?CashDrawerDevice device): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "state": "CLOSED",
  "opened_at": "opened_at8",
  "ended_at": "ended_at2",
  "closed_at": "closed_at2"
}
```

