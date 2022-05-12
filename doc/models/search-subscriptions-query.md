
# Search Subscriptions Query

Represents a query, consisting of specified query expressions, used to search for subscriptions.

## Structure

`SearchSubscriptionsQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?SearchSubscriptionsFilter`](../../doc/models/search-subscriptions-filter.md) | Optional | Represents a set of query expressions (filters) to narrow the scope of targeted subscriptions returned by<br>the [SearchSubscriptions](../../doc/apis/subscriptions.md#search-subscriptions) endpoint. | getFilter(): ?SearchSubscriptionsFilter | setFilter(?SearchSubscriptionsFilter filter): void |

## Example (as JSON)

```json
{
  "filter": null
}
```

