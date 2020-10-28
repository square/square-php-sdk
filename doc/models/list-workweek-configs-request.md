
# List Workweek Configs Request

A request for a set of `WorkweekConfig` objects

## Structure

`ListWorkweekConfigsRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `limit` | `?int` | Optional | Maximum number of Workweek Configs to return per page. | getLimit(): ?int | setLimit(?int limit): void |
| `cursor` | `?string` | Optional | Pointer to the next page of Workweek Config results to fetch. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "limit": 172,
  "cursor": "cursor6"
}
```

