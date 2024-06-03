
# Search Events Sort

Criteria to sort events by.

## Structure

`SearchEventsSort`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `field` | [`?string(SearchEventsSortField)`](../../doc/models/search-events-sort-field.md) | Optional | Specifies the sort key for events returned from a search. | getField(): ?string | setField(?string field): void |
| `order` | [`?string(SortOrder)`](../../doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getOrder(): ?string | setOrder(?string order): void |

## Example (as JSON)

```json
{
  "field": "DEFAULT",
  "order": "DESC"
}
```

