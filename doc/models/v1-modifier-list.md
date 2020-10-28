
# V1 Modifier List

V1ModifierList

## Structure

`V1ModifierList`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The modifier list's unique ID. | getId(): ?string | setId(?string id): void |
| `name` | `?string` | Optional | The modifier list's name. | getName(): ?string | setName(?string name): void |
| `selectionType` | [`?string (V1ModifierListSelectionType)`](/doc/models/v1-modifier-list-selection-type.md) | Optional | - | getSelectionType(): ?string | setSelectionType(?string selectionType): void |
| `modifierOptions` | [`?(V1ModifierOption[])`](/doc/models/v1-modifier-option.md) | Optional | The options included in the modifier list. | getModifierOptions(): ?array | setModifierOptions(?array modifierOptions): void |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. | getV2Id(): ?string | setV2Id(?string v2Id): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "name": "name0",
  "selection_type": "SINGLE",
  "modifier_options": [
    {
      "id": "id6",
      "name": "name6",
      "price_money": {
        "amount": 96,
        "currency_code": "CLP"
      },
      "on_by_default": false,
      "ordinal": 186
    },
    {
      "id": "id7",
      "name": "name7",
      "price_money": {
        "amount": 95,
        "currency_code": "CNY"
      },
      "on_by_default": true,
      "ordinal": 187
    },
    {
      "id": "id8",
      "name": "name8",
      "price_money": {
        "amount": 94,
        "currency_code": "COP"
      },
      "on_by_default": false,
      "ordinal": 188
    }
  ],
  "v2_id": "v2_id2"
}
```

