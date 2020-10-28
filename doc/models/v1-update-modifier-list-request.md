
# V1 Update Modifier List Request

V1UpdateModifierListRequest

## Structure

`V1UpdateModifierListRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `name` | `?string` | Optional | The modifier list's name. | getName(): ?string | setName(?string name): void |
| `selectionType` | [`?string (V1UpdateModifierListRequestSelectionType)`](/doc/models/v1-update-modifier-list-request-selection-type.md) | Optional | - | getSelectionType(): ?string | setSelectionType(?string selectionType): void |

## Example (as JSON)

```json
{
  "name": "name0",
  "selection_type": "SINGLE"
}
```

