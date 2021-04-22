
# Custom Attribute Filter

Supported custom attribute query expressions for calling the
[SearchCatalogItems](/doc/apis/catalog.md#search-catalog-items)
endpoint to search for items or item variations.

## Structure

`CustomAttributeFilter`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `customAttributeDefinitionId` | `?string` | Optional | A query expression to filter items or item variations by matching their custom attributes'<br>`custom_attribute_definition_id`<br>property value against the the specified id. | getCustomAttributeDefinitionId(): ?string | setCustomAttributeDefinitionId(?string customAttributeDefinitionId): void |
| `key` | `?string` | Optional | A query expression to filter items or item variations by matching their custom attributes'<br>`key` property value against<br>the specified key. | getKey(): ?string | setKey(?string key): void |
| `stringFilter` | `?string` | Optional | A query expression to filter items or item variations by matching their custom attributes'<br>`string_value`  property value<br>against the specified text. | getStringFilter(): ?string | setStringFilter(?string stringFilter): void |
| `numberFilter` | [`?Range`](/doc/models/range.md) | Optional | The range of a number value between the specified lower and upper bounds. | getNumberFilter(): ?Range | setNumberFilter(?Range numberFilter): void |
| `selectionUidsFilter` | `?(string[])` | Optional | A query expression to filter items or item variations by matching  their custom attributes'<br>`selection_uid_values`<br>values against the specified selection uids. | getSelectionUidsFilter(): ?array | setSelectionUidsFilter(?array selectionUidsFilter): void |
| `boolFilter` | `?bool` | Optional | A query expression to filter items or item variations by matching their custom attributes'<br>`boolean_value` property values<br>against the specified Boolean expression. | getBoolFilter(): ?bool | setBoolFilter(?bool boolFilter): void |

## Example (as JSON)

```json
{
  "custom_attribute_definition_id": "custom_attribute_definition_id2",
  "key": "key0",
  "string_filter": "string_filter2",
  "number_filter": {
    "min": "min8",
    "max": "max4"
  },
  "selection_uids_filter": [
    "selection_uids_filter4",
    "selection_uids_filter5"
  ]
}
```

