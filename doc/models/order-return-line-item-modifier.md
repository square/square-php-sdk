
# Order Return Line Item Modifier

A line item modifier being returned.

## Structure

`OrderReturnLineItemModifier`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | A unique ID that identifies the return modifier only within this order.<br>**Constraints**: *Maximum Length*: `60` | getUid(): ?string | setUid(?string uid): void |
| `sourceModifierUid` | `?string` | Optional | The modifier `uid` from the order's line item that contains the<br>original sale of this line item modifier.<br>**Constraints**: *Maximum Length*: `60` | getSourceModifierUid(): ?string | setSourceModifierUid(?string sourceModifierUid): void |
| `catalogObjectId` | `?string` | Optional | The catalog object ID referencing [CatalogModifier](../../doc/models/catalog-modifier.md).<br>**Constraints**: *Maximum Length*: `192` | getCatalogObjectId(): ?string | setCatalogObjectId(?string catalogObjectId): void |
| `catalogVersion` | `?int` | Optional | The version of the catalog object that this line item modifier references. | getCatalogVersion(): ?int | setCatalogVersion(?int catalogVersion): void |
| `name` | `?string` | Optional | The name of the item modifier.<br>**Constraints**: *Maximum Length*: `255` | getName(): ?string | setName(?string name): void |
| `basePriceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getBasePriceMoney(): ?Money | setBasePriceMoney(?Money basePriceMoney): void |
| `totalPriceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getTotalPriceMoney(): ?Money | setTotalPriceMoney(?Money totalPriceMoney): void |

## Example (as JSON)

```json
{
  "uid": null,
  "source_modifier_uid": null,
  "catalog_object_id": null,
  "catalog_version": null,
  "name": null,
  "base_price_money": null,
  "total_price_money": null
}
```

