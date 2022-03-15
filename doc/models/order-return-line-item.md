
# Order Return Line Item

The line item being returned in an order.

## Structure

`OrderReturnLineItem`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | A unique ID for this return line-item entry.<br>**Constraints**: *Maximum Length*: `60` | getUid(): ?string | setUid(?string uid): void |
| `sourceLineItemUid` | `?string` | Optional | The `uid` of the line item in the original sale order.<br>**Constraints**: *Maximum Length*: `60` | getSourceLineItemUid(): ?string | setSourceLineItemUid(?string sourceLineItemUid): void |
| `name` | `?string` | Optional | The name of the line item.<br>**Constraints**: *Maximum Length*: `512` | getName(): ?string | setName(?string name): void |
| `quantity` | `string` | Required | The quantity returned, formatted as a decimal number.<br>For example, `"3"`.<br><br>Line items with a `quantity_unit` can have non-integer quantities.<br>For example, `"1.70000"`.<br>**Constraints**: *Minimum Length*: `1`, *Maximum Length*: `12` | getQuantity(): string | setQuantity(string quantity): void |
| `quantityUnit` | [`?OrderQuantityUnit`](../../doc/models/order-quantity-unit.md) | Optional | Contains the measurement unit for a quantity and a precision that<br>specifies the number of digits after the decimal point for decimal quantities. | getQuantityUnit(): ?OrderQuantityUnit | setQuantityUnit(?OrderQuantityUnit quantityUnit): void |
| `note` | `?string` | Optional | The note of the return line item.<br>**Constraints**: *Maximum Length*: `2000` | getNote(): ?string | setNote(?string note): void |
| `catalogObjectId` | `?string` | Optional | The [CatalogItemVariation](../../doc/models/catalog-item-variation.md) ID applied to this return line item.<br>**Constraints**: *Maximum Length*: `192` | getCatalogObjectId(): ?string | setCatalogObjectId(?string catalogObjectId): void |
| `catalogVersion` | `?int` | Optional | The version of the catalog object that this line item references. | getCatalogVersion(): ?int | setCatalogVersion(?int catalogVersion): void |
| `variationName` | `?string` | Optional | The name of the variation applied to this return line item.<br>**Constraints**: *Maximum Length*: `400` | getVariationName(): ?string | setVariationName(?string variationName): void |
| `itemType` | [`?string (OrderLineItemItemType)`](../../doc/models/order-line-item-item-type.md) | Optional | Represents the line item type. | getItemType(): ?string | setItemType(?string itemType): void |
| `returnModifiers` | [`?(OrderReturnLineItemModifier[])`](../../doc/models/order-return-line-item-modifier.md) | Optional | The [CatalogModifier](../../doc/models/catalog-modifier.md)s applied to this line item. | getReturnModifiers(): ?array | setReturnModifiers(?array returnModifiers): void |
| `appliedTaxes` | [`?(OrderLineItemAppliedTax[])`](../../doc/models/order-line-item-applied-tax.md) | Optional | The list of references to `OrderReturnTax` entities applied to the return line item. Each<br>`OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level<br>`OrderReturnTax` applied to the return line item. On reads, the applied amount<br>is populated. | getAppliedTaxes(): ?array | setAppliedTaxes(?array appliedTaxes): void |
| `appliedDiscounts` | [`?(OrderLineItemAppliedDiscount[])`](../../doc/models/order-line-item-applied-discount.md) | Optional | The list of references to `OrderReturnDiscount` entities applied to the return line item. Each<br>`OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level<br>`OrderReturnDiscount` applied to the return line item. On reads, the applied amount<br>is populated. | getAppliedDiscounts(): ?array | setAppliedDiscounts(?array appliedDiscounts): void |
| `basePriceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getBasePriceMoney(): ?Money | setBasePriceMoney(?Money basePriceMoney): void |
| `variationTotalPriceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getVariationTotalPriceMoney(): ?Money | setVariationTotalPriceMoney(?Money variationTotalPriceMoney): void |
| `grossReturnMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getGrossReturnMoney(): ?Money | setGrossReturnMoney(?Money grossReturnMoney): void |
| `totalTaxMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalTaxMoney(): ?Money | setTotalTaxMoney(?Money totalTaxMoney): void |
| `totalDiscountMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalDiscountMoney(): ?Money | setTotalDiscountMoney(?Money totalDiscountMoney): void |
| `totalMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](../../https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalMoney(): ?Money | setTotalMoney(?Money totalMoney): void |

## Example (as JSON)

```json
{
  "uid": "uid0",
  "source_line_item_uid": "source_line_item_uid2",
  "name": "name0",
  "quantity": "quantity6",
  "quantity_unit": {
    "measurement_unit": {
      "custom_unit": {
        "name": "name8",
        "abbreviation": "abbreviation0"
      },
      "area_unit": "IMPERIAL_SQUARE_FOOT",
      "length_unit": "METRIC_METER",
      "volume_unit": "GENERIC_CUP",
      "weight_unit": "IMPERIAL_WEIGHT_OUNCE"
    },
    "precision": 54,
    "catalog_object_id": "catalog_object_id0",
    "catalog_version": 12
  },
  "note": "note4"
}
```

