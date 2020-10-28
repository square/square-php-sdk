
# V1 List Employee Roles Request

## Structure

`V1ListEmployeeRolesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getOrder(): ?string | setOrder(?string order): void |
| `limit` | `?int` | Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. | getLimit(): ?int | setLimit(?int limit): void |
| `batchToken` | `?string` | Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. | getBatchToken(): ?string | setBatchToken(?string batchToken): void |

## Example (as JSON)

```json
{
  "order": "DESC",
  "limit": 172,
  "batch_token": "batch_token2"
}
```

