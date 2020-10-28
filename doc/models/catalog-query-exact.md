
# Catalog Query Exact

The query filter to return the search result by exact match of the specified attribute name and value.

## Structure

`CatalogQueryExact`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `attributeName` | `string` | The name of the attribute to be searched. Matching of the attribute name is exact. | getAttributeName(): string | setAttributeName(string attributeName): void |
| `attributeValue` | `string` | The desired value of the search attribute. Matching of the attribute value is case insensitive and can be partial.<br>For example, if a specified value of "sma", objects with the named attribute value of "Small", "small" are both matched. | getAttributeValue(): string | setAttributeValue(string attributeValue): void |

## Example (as JSON)

```json
{
  "attribute_name": "attribute_name4",
  "attribute_value": "attribute_value6"
}
```

