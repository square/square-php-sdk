
# V1 Variation

V1Variation

## Structure

`V1Variation`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The item variation's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The item variation's name. | getName(): ?string | setName(?string name): void |
| `itemId` | `?string` | Optional | The ID of the variation's associated item. | getItemId(): ?string | setItemId(?string itemId): void |
| `ordinal` | `?int` | Optional | Indicates the variation's list position when displayed in Square Point of Sale and the merchant dashboard. If more than one variation for the same item has the same ordinal value, those variations are displayed in alphabetical order | getOrdinal(): ?int | setOrdinal(?int ordinal): void |
| `pricingType` | [`?string (V1VariationPricingType)`](/doc/models/v1-variation-pricing-type.md) | Optional | - | getPricingType(): ?string | setPricingType(?string pricingType): void |
| `priceMoney` | [`?V1Money`](/doc/models/v1-money.md) | Optional | - | getPriceMoney(): ?V1Money | setPriceMoney(?V1Money priceMoney): void |
| `sku` | `?string` | Optional | The item variation's SKU, if any. | getSku(): ?string | setSku(?string sku): void |
| `trackInventory` | `?bool` | Optional | If true, inventory tracking is active for the variation. | getTrackInventory(): ?bool | setTrackInventory(?bool trackInventory): void |
| `inventoryAlertType` | [`?string (V1VariationInventoryAlertType)`](/doc/models/v1-variation-inventory-alert-type.md) | Optional | - | getInventoryAlertType(): ?string | setInventoryAlertType(?string inventoryAlertType): void |
| `inventoryAlertThreshold` | `?int` | Optional | If the inventory quantity for the variation is less than or equal to this value and inventory_alert_type is LOW_QUANTITY, the variation displays an alert in the merchant dashboard. | getInventoryAlertThreshold(): ?int | setInventoryAlertThreshold(?int inventoryAlertThreshold): void |
| `userData` | `?string` | Optional | Arbitrary metadata associated with the variation. Cannot exceed 255 characters. | getUserData(): ?string | setUserData(?string userData): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "item_id": "item_id0",
  "ordinal": 80,
  "pricing_type": "FIXED_PRICING"
}
```

