
# Catalog Item Modifier List Info

References a text-based modifier or a list of non text-based modifiers applied to a `CatalogItem` instance
and specifies supported behaviors of the application.

## Structure

`CatalogItemModifierListInfo`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `modifierListId` | `string` | Required | The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.<br>**Constraints**: *Minimum Length*: `1` | getModifierListId(): string | setModifierListId(string modifierListId): void |
| `modifierOverrides` | [`?(CatalogModifierOverride[])`](../../doc/models/catalog-modifier-override.md) | Optional | A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is enabled by default. | getModifierOverrides(): ?array | setModifierOverrides(?array modifierOverrides): void |
| `minSelectedModifiers` | `?int` | Optional | If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this `CatalogModifierList`.<br>The default value is `-1`.<br><br>When  `CatalogModifierList.selection_type` is `MULTIPLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`<br>and `CatalogModifierListInfo.max_selected_modifier=-1` means that from zero to the maximum number of modifiers of<br>the `CatalogModifierList` can be selected from the `CatalogModifierList`.<br><br>When the `CatalogModifierList.selection_type` is `SINGLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`<br>and `CatalogModifierListInfo.max_selected_modifier=-1` means that exactly one modifier must be present in<br>and can be selected from the `CatalogModifierList` | getMinSelectedModifiers(): ?int | setMinSelectedModifiers(?int minSelectedModifiers): void |
| `maxSelectedModifiers` | `?int` | Optional | If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this `CatalogModifierList`.<br>The default value is `-1`.<br><br>When  `CatalogModifierList.selection_type` is `MULTIPLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`<br>and `CatalogModifierListInfo.max_selected_modifier=-1` means that from zero to the maximum number of modifiers of<br>the `CatalogModifierList` can be selected from the `CatalogModifierList`.<br><br>When the `CatalogModifierList.selection_type` is `SINGLE`, `CatalogModifierListInfo.min_selected_modifiers=-1`<br>and `CatalogModifierListInfo.max_selected_modifier=-1` means that exactly one modifier must be present in<br>and can be selected from the `CatalogModifierList` | getMaxSelectedModifiers(): ?int | setMaxSelectedModifiers(?int maxSelectedModifiers): void |
| `enabled` | `?bool` | Optional | If `true`, enable this `CatalogModifierList`. The default value is `true`. | getEnabled(): ?bool | setEnabled(?bool enabled): void |
| `ordinal` | `?int` | Optional | The position of this `CatalogItemModifierListInfo` object within the `modifier_list_info` list applied<br>to a `CatalogItem` instance. | getOrdinal(): ?int | setOrdinal(?int ordinal): void |

## Example (as JSON)

```json
{
  "modifier_list_id": "modifier_list_id6",
  "modifier_overrides": [
    {
      "modifier_id": "modifier_id8",
      "on_by_default": false
    },
    {
      "modifier_id": "modifier_id8",
      "on_by_default": false
    }
  ],
  "min_selected_modifiers": 170,
  "max_selected_modifiers": 66,
  "enabled": false,
  "ordinal": 204
}
```

