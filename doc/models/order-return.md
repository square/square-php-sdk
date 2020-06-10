## Order Return

The set of line items, service charges, taxes, discounts, tips, etc. being returned in an Order.

### Structure

`OrderReturn`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `uid` | `?string` | Optional | Unique ID that identifies the return only within this order. |
| `sourceOrderId` | `?string` | Optional | Order which contains the original sale of these returned line items. This will be unset<br>for unlinked returns. |
| `returnLineItems` | [`?(OrderReturnLineItem[])`](/doc/models/order-return-line-item.md) | Optional | Collection of line items which are being returned. |
| `returnServiceCharges` | [`?(OrderReturnServiceCharge[])`](/doc/models/order-return-service-charge.md) | Optional | Collection of service charges which are being returned. |
| `returnTaxes` | [`?(OrderReturnTax[])`](/doc/models/order-return-tax.md) | Optional | Collection of references to taxes being returned for an order, including the total<br>applied tax amount to be returned. The taxes must reference a top-level tax ID from the source<br>order. |
| `returnDiscounts` | [`?(OrderReturnDiscount[])`](/doc/models/order-return-discount.md) | Optional | Collection of references to discounts being returned for an order, including the total<br>applied discount amount to be returned. The discounts must reference a top-level discount ID<br>from the source order. |
| `roundingAdjustment` | [`?OrderRoundingAdjustment`](/doc/models/order-rounding-adjustment.md) | Optional | A rounding adjustment of the money being returned. Commonly used to apply Cash Rounding<br>when the minimum unit of account is smaller than the lowest physical denomination of currency. |
| `returnAmounts` | [`?OrderMoneyAmounts`](/doc/models/order-money-amounts.md) | Optional | A collection of various money amounts. |

### Example (as JSON)

```json
{
  "uid": null,
  "source_order_id": null,
  "return_line_items": null,
  "return_service_charges": null,
  "return_taxes": null,
  "return_discounts": null,
  "rounding_adjustment": null,
  "return_amounts": null
}
```

