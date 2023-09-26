
# Search Orders Query

Contains query criteria for the search.

## Structure

`SearchOrdersQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?SearchOrdersFilter`](../../doc/models/search-orders-filter.md) | Optional | Filtering criteria to use for a `SearchOrders` request. Multiple filters<br>are ANDed together. | getFilter(): ?SearchOrdersFilter | setFilter(?SearchOrdersFilter filter): void |
| `sort` | [`?SearchOrdersSort`](../../doc/models/search-orders-sort.md) | Optional | Sorting criteria for a `SearchOrders` request. Results can only be sorted<br>by a timestamp field. | getSort(): ?SearchOrdersSort | setSort(?SearchOrdersSort sort): void |

## Example (as JSON)

```json
{
  "filter": {
    "state_filter": {
      "states": [
        "CANCELED",
        "DRAFT"
      ]
    },
    "date_time_filter": {
      "created_at": {
        "start_at": "start_at4",
        "end_at": "end_at8"
      },
      "updated_at": {
        "start_at": "start_at6",
        "end_at": "end_at6"
      },
      "closed_at": {
        "start_at": "start_at4",
        "end_at": "end_at8"
      }
    },
    "fulfillment_filter": {
      "fulfillment_types": [
        "DELIVERY"
      ],
      "fulfillment_states": [
        "CANCELED",
        "FAILED"
      ]
    },
    "source_filter": {
      "source_names": [
        "source_names6"
      ]
    },
    "customer_filter": {
      "customer_ids": [
        "customer_ids3",
        "customer_ids4"
      ]
    }
  },
  "sort": {
    "sort_field": "UPDATED_AT",
    "sort_order": "DESC"
  }
}
```

