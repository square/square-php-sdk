
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
| `returnTips` | [`?(OrderReturnTip[])`](../../doc/models/order-return-tip.md) | Optional | A collection of references to tips being returned for an order. | getReturnTips(): ?array | setReturnTips(?array returnTips): void |
| `roundingAdjustment` | [`?OrderRoundingAdjustment`](../../doc/models/order-rounding-adjustment.md) | Optional | A rounding adjustment of the money being returned. Commonly used to apply cash rounding<br>when the minimum unit of the account is smaller than the lowest physical denomination of the currency. | getRoundingAdjustment(): ?OrderRoundingAdjustment | setRoundingAdjustment(?OrderRoundingAdjustment roundingAdjustment): void |
| `returnAmounts` | [`?OrderMoneyAmounts`](../../doc/models/order-money-amounts.md) | Optional | A collection of various money amounts. | getReturnAmounts(): ?OrderMoneyAmounts | setReturnAmounts(?OrderMoneyAmounts returnAmounts): void |

## Example (as JSON)

```json
{
  "uid": "uid2",
  "source_order_id": "source_order_id0",
  "return_line_items": [
    {
      "uid": "uid0",
      "source_line_item_uid": "source_line_item_uid2",
      "name": "name0",
      "quantity": "quantity6",
      "quantity_unit": {
        "measurement_unit": {
          "custom_unit": {
            "name": "name2",
            "abbreviation": "abbreviation4"
          },
          "area_unit": "IMPERIAL_ACRE",
          "length_unit": "IMPERIAL_INCH",
          "volume_unit": "METRIC_LITER",
          "weight_unit": "IMPERIAL_WEIGHT_OUNCE"
        },
        "precision": 54,
        "catalog_object_id": "catalog_object_id0",
        "catalog_version": 12
      },
      "note": "note4"
    }
  ],
  "return_service_charges": [
    {
      "uid": "uid6",
      "source_service_charge_uid": "source_service_charge_uid0",
      "name": "name6",
      "catalog_object_id": "catalog_object_id0",
      "catalog_version": 12
    },
    {
      "uid": "uid6",
      "source_service_charge_uid": "source_service_charge_uid0",
      "name": "name6",
      "catalog_object_id": "catalog_object_id0",
      "catalog_version": 12
    }
  ],
  "return_taxes": [
    {
      "uid": "uid2",
      "source_tax_uid": "source_tax_uid0",
      "catalog_object_id": "catalog_object_id4",
      "catalog_version": 106,
      "name": "name2"
    },
    {
      "uid": "uid2",
      "source_tax_uid": "source_tax_uid0",
      "catalog_object_id": "catalog_object_id4",
      "catalog_version": 106,
      "name": "name2"
    },
    {
      "uid": "uid2",
      "source_tax_uid": "source_tax_uid0",
      "catalog_object_id": "catalog_object_id4",
      "catalog_version": 106,
      "name": "name2"
    }
  ]
}
```

