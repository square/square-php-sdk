
# Search Events Query

Contains query criteria for the search.

## Structure

`SearchEventsQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?SearchEventsFilter`](../../doc/models/search-events-filter.md) | Optional | Criteria to filter events by. | getFilter(): ?SearchEventsFilter | setFilter(?SearchEventsFilter filter): void |
| `sort` | [`?SearchEventsSort`](../../doc/models/search-events-sort.md) | Optional | Criteria to sort events by. | getSort(): ?SearchEventsSort | setSort(?SearchEventsSort sort): void |

## Example (as JSON)

```json
{
  "filter": {
    "event_types": [
      "event_types2",
      "event_types3"
    ],
    "merchant_ids": [
      "merchant_ids1",
      "merchant_ids2"
    ],
    "location_ids": [
      "location_ids4"
    ],
    "created_at": {
      "start_at": "start_at4",
      "end_at": "end_at8"
    }
  },
  "sort": {
    "field": "DEFAULT",
    "order": "DESC"
  }
}
```

