
# List Refunds Request

Defines the query parameters that can be included in
a request to the [ListRefunds](#endpoint-listrefunds) endpoint.

Deprecated - recommend using [SearchOrders](#endpoint-orders-searchorders)

## Structure

`ListRefundsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `beginTime` | `?string` | Optional | The beginning of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](#dateranges) for details on date inclusivity/exclusivity.<br><br>Default value: The current time minus one year. | getBeginTime(): ?string | setBeginTime(?string beginTime): void |
| `endTime` | `?string` | Optional | The end of the requested reporting period, in RFC 3339 format.<br><br>See [Date ranges](#dateranges) for details on date inclusivity/exclusivity.<br><br>Default value: The current time. | getEndTime(): ?string | setEndTime(?string endTime): void |
| `sortOrder` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getSortOrder(): ?string | setSortOrder(?string sortOrder): void |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for your original query.<br><br>See [Paginating results](#paginatingresults) for more information. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "begin_time": "begin_time2",
  "end_time": "end_time2",
  "sort_order": "DESC",
  "cursor": "cursor6"
}
```

