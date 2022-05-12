
# Order Return

The set of line items, service charges, taxes, discounts, tips, and other items being returned in an order.

## Structure

`OrderReturn`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | A unique ID that identifies the return only within this order.<br>**Constraints**: *Maximum Length*: `60` | getUid(): ?string | setUid(?string uid): void |
| `sourceOrderId` | `?string` | Optional | An order that contains the original sale of these return line items. This is unset<br>for unlinked returns. | getSourceOrderId(): ?string | setSourceOrderId(?string sourceOrderId): void |
| `returnLineItems` | [`?(OrderReturnLineItem[])`](../../doc/models/order-return-line-item.md) | Optional | A collection of line items that are being returned. | getReturnLineItems(): ?array | setReturnLineItems(?array returnLineItems): void |
| `returnServiceCharges` | [`?(OrderReturnServiceCharge[])`](../../doc/models/order-return-service-charge.md) | Optional | A collection of service charges that are being returned. | getReturnServiceCharges(): ?array | setReturnServiceCharges(?array returnServiceCharges): void |
| `returnTaxes` | [`?(OrderReturnTax[])`](../../doc/models/order-return-tax.md) | Optional | A collection of references to taxes being returned for an order, including the total<br>applied tax amount to be returned. The taxes must reference a top-level tax ID from the source<br>order. | getReturnTaxes(): ?array | setReturnTaxes(?array returnTaxes): void |
| `returnDiscounts` | [`?(OrderReturnDiscount[])`](../../doc/models/order-return-discount.md) | Optional | A collection of references to discounts being returned for an order, including the total<br>applied discount amount to be returned. The discounts must reference a top-level discount ID<br>from the source order. | getReturnDiscounts(): ?array | setReturnDiscounts(?array returnDiscounts): void |
| `roundingAdjustment` | [`?OrderRoundingAdjustment`](../../doc/models/order-rounding-adjustment.md) | Optional | A rounding adjustment of the money being returned. Commonly used to apply cash rounding<br>when the minimum unit of the account is smaller than the lowest physical denomination of the currency. | getRoundingAdjustment(): ?OrderRoundingAdjustment | setRoundingAdjustment(?OrderRoundingAdjustment roundingAdjustment): void |
| `returnAmounts` | [`?OrderMoneyAmounts`](../../doc/models/order-money-amounts.md) | Optional | A collection of various money amounts. | getReturnAmounts(): ?OrderMoneyAmounts | setReturnAmounts(?OrderMoneyAmounts returnAmounts): void |

## Example (as JSON)

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

