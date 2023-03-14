
# Catalog Custom Attribute Value

An instance of a custom attribute. Custom attributes can be defined and
added to `ITEM` and `ITEM_VARIATION` type catalog objects.
[Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-attributes).

## Structure

`CatalogCustomAttributeValue`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `name` | `?string` | Optional | The name of the custom attribute. | getName(): ?string | setName(?string name): void |
| `stringValue` | `?string` | Optional | The string value of the custom attribute.  Populated if `type` = `STRING`. | getStringValue(): ?string | setStringValue(?string stringValue): void |
| `customAttributeDefinitionId` | `?string` | Optional | The id of the [CatalogCustomAttributeDefinition](../../doc/models/catalog-custom-attribute-definition.md) this value belongs to. | getCustomAttributeDefinitionId(): ?string | setCustomAttributeDefinitionId(?string customAttributeDefinitionId): void |
| `type` | [`?string (CatalogCustomAttributeDefinitionType)`](../../doc/models/catalog-custom-attribute-definition-type.md) | Optional | Defines the possible types for a custom attribute. | getType(): ?string | setType(?string type): void |
| `numberValue` | `?string` | Optional | Populated if `type` = `NUMBER`. Contains a string<br>representation of a decimal number, using a `.` as the decimal separator. | getNumberValue(): ?string | setNumberValue(?string numberValue): void |
| `booleanValue` | `?bool` | Optional | A `true` or `false` value. Populated if `type` = `BOOLEAN`. | getBooleanValue(): ?bool | setBooleanValue(?bool booleanValue): void |
| `selectionUidValues` | `?(string[])` | Optional | One or more choices from `allowed_selections`. Populated if `type` = `SELECTION`. | getSelectionUidValues(): ?array | setSelectionUidValues(?array selectionUidValues): void |
| `key` | `?string` | Optional | A copy of key from the associated `CatalogCustomAttributeDefinition`. | getKey(): ?string | setKey(?string key): void |

## Example (as JSON)

```json
{
  "name": null,
  "string_value": null,
  "custom_attribute_definition_id": null,
  "type": null,
  "number_value": null,
  "boolean_value": null,
  "selection_uid_values": null,
  "key": null
}
```

