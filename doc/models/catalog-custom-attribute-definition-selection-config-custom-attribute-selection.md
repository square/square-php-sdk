
# Catalog Custom Attribute Definition Selection Config Custom Attribute Selection

A named selection for this `SELECTION`-type custom attribute definition.

## Structure

`CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `uid` | `?string` | Optional | Unique ID set by Square. | getUid(): ?string | setUid(?string uid): void |
| `name` | `string` |  | Selection name, unique within `allowed_selections`. | getName(): string | setName(string name): void |

## Example (as JSON)

```json
{
  "uid": "uid0",
  "name": "name0"
}
```

