## V1 Modifier List

V1ModifierList

### Structure

`V1ModifierList`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `id` | `?string` | Optional | The modifier list's unique ID. |
| `name` | `?string` | Optional | The modifier list's name. |
| `selectionType` | [`?string (V1ModifierListSelectionType)`](/doc/models/v1-modifier-list-selection-type.md) | Optional | -  |
| `modifierOptions` | [`?(V1ModifierOption[])`](/doc/models/v1-modifier-option.md) | Optional | The options included in the modifier list. |
| `v2Id` | `?string` | Optional | The ID of the CatalogObject in the Connect v2 API. Objects that are shared across multiple locations share the same v2 ID. |

### Example (as JSON)

```json
{
  "id": null,
  "name": null,
  "selection_type": null,
  "modifier_options": null,
  "v2_id": null
}
```

