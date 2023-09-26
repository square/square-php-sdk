
# Shift Query

The parameters of a `Shift` search query, which includes filter and sort options.

## Structure

`ShiftQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?ShiftFilter`](../../doc/models/shift-filter.md) | Optional | Defines a filter used in a search for `Shift` records. `AND` logic is<br>used by Square's servers to apply each filter property specified. | getFilter(): ?ShiftFilter | setFilter(?ShiftFilter filter): void |
| `sort` | [`?ShiftSort`](../../doc/models/shift-sort.md) | Optional | Sets the sort order of search results. | getSort(): ?ShiftSort | setSort(?ShiftSort sort): void |

## Example (as JSON)

```json
{
  "filter": {
    "location_ids": [
      "location_ids4"
    ],
    "employee_ids": [
      "employee_ids9"
    ],
    "status": "OPEN",
    "start": {
      "start_at": "start_at6",
      "end_at": "end_at6"
    },
    "end": {
      "start_at": "start_at0",
      "end_at": "end_at2"
    }
  },
  "sort": {
    "field": "START_AT",
    "order": "DESC"
  }
}
```

