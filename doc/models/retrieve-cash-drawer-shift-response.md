## Retrieve Cash Drawer Shift Response

### Structure

`RetrieveCashDrawerShiftResponse`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `cashDrawerShift` | [`?CashDrawerShift`](/doc/models/cash-drawer-shift.md) | Optional | This model gives the details of a cash drawer shift.<br>The cash_payment_money, cash_refund_money, cash_paid_in_money,<br>and cash_paid_out_money fields are all computed by summing their respective<br>event types. |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Any errors that occurred during the request. |

### Example (as JSON)

```json
{
  "cash_drawer_shift": null,
  "errors": null
}
```

