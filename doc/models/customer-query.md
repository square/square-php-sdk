
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
  "filter": {
    "creation_source": {
      "values": [
        "INVOICES",
        "LOYALTY",
        "MARKETING"
      ],
      "rule": "INCLUDE"
    },
    "created_at": {
      "start_at": "start_at4",
      "end_at": "end_at8"
    },
    "updated_at": {
      "start_at": "start_at2",
      "end_at": "end_at0"
    },
    "email_address": {
      "exact": "exact2",
      "fuzzy": "fuzzy2"
    },
    "phone_number": {
      "exact": "exact8",
      "fuzzy": "fuzzy6"
    }
  },
  "sort": {
    "field": "DEFAULT",
    "order": "DESC"
  }
}
```

