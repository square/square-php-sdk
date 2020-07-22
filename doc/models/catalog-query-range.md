## Catalog Query Range

The query filter to return the search result whose named attribute values fall between the specified range.

### Structure

`CatalogQueryRange`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `attributeName` | `string` |  | The name of the attribute to be searched. |
| `attributeMinValue` | `?int` | Optional | The desired minimum value for the search attribute (inclusive). |
| `attributeMaxValue` | `?int` | Optional | The desired maximum value for the search attribute (inclusive). |

### Example (as JSON)

```json
{
  "attribute_name": "attribute_name4",
  "attribute_min_value": null,
  "attribute_max_value": null
}
```

