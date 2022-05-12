
# Customer Query

Represents a query (including filtering criteria, sorting criteria, or both) used to search
for customer profiles.

## Structure

`CustomerQuery`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `filter` | [`?CustomerFilter`](../../doc/models/customer-filter.md) | Optional | Represents a set of `CustomerQuery` filters used to limit the set of<br>customers returned by the [SearchCustomers](../../doc/apis/customers.md#search-customers) endpoint. | getFilter(): ?CustomerFilter | setFilter(?CustomerFilter filter): void |
| `sort` | [`?CustomerSort`](../../doc/models/customer-sort.md) | Optional | Specifies how searched customers profiles are sorted, including the sort key and sort order. | getSort(): ?CustomerSort | setSort(?CustomerSort sort): void |

## Example (as JSON)

```json
{
  "filter": null,
  "sort": null
}
```

