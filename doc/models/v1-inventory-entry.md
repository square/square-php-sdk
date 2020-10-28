
# V1 Inventory Entry

V1InventoryEntry

## Structure

`V1InventoryEntry`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `variationId` | `?string` | Optional | The variation that the entry corresponds to. | getVariationId(): ?string | setVariationId(?string variationId): void |
| `quantityOnHand` | `?float` | Optional | The current available quantity of the item variation. | getQuantityOnHand(): ?float | setQuantityOnHand(?float quantityOnHand): void |

## Example (as JSON)

```json
{
  "variation_id": "variation_id2",
  "quantity_on_hand": 123.5
}
```

