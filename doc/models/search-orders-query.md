
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
  "filter": null,
  "sort": null
}
```

