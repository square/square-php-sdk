
# V1 Adjust Inventory Request

V1AdjustInventoryRequest

## Structure

`V1AdjustInventoryRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `quantityDelta` | `?float` | Optional | The number to adjust the variation's quantity by. | getQuantityDelta(): ?float | setQuantityDelta(?float quantityDelta): void |
| `adjustmentType` | [`?string (V1AdjustInventoryRequestAdjustmentType)`](/doc/models/v1-adjust-inventory-request-adjustment-type.md) | Optional | - | getAdjustmentType(): ?string | setAdjustmentType(?string adjustmentType): void |
| `memo` | `?string` | Optional | A note about the inventory adjustment. | getMemo(): ?string | setMemo(?string memo): void |

## Example (as JSON)

```json
{
  "quantity_delta": 223.58,
  "adjustment_type": "MANUAL_ADJUST",
  "memo": "memo4"
}
```

