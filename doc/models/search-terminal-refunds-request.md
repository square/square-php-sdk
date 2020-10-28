
# Search Terminal Refunds Request

## Structure

`SearchTerminalRefundsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `query` | [`?TerminalRefundQuery`](/doc/models/terminal-refund-query.md) | Optional | - | getQuery(): ?TerminalRefundQuery | setQuery(?TerminalRefundQuery query): void |
| `cursor` | `?string` | Optional | A pagination cursor returned by a previous call to this endpoint.<br>Provide this to retrieve the next set of results for the original query. | getCursor(): ?string | setCursor(?string cursor): void |
| `limit` | `?int` | Optional | Limit the number of results returned for a single request. | getLimit(): ?int | setLimit(?int limit): void |

## Example (as JSON)

```json
{
  "query": {
    "filter": {
      "device_id": "device_id0",
      "created_at": {
        "start_at": "start_at4",
        "end_at": "end_at8"
      },
      "status": "status4"
    },
    "sort": {
      "sort_order": "sort_order8"
    }
  },
  "cursor": "cursor6",
  "limit": 172
}
```

