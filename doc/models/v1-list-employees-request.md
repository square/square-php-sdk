
# V1 List Employees Request

## Structure

`V1ListEmployeesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. | getOrder(): ?string | setOrder(?string order): void |
| `beginUpdatedAt` | `?string` | Optional | If filtering results by their updated_at field, the beginning of the requested reporting period, in ISO 8601 format | getBeginUpdatedAt(): ?string | setBeginUpdatedAt(?string beginUpdatedAt): void |
| `endUpdatedAt` | `?string` | Optional | If filtering results by there updated_at field, the end of the requested reporting period, in ISO 8601 format. | getEndUpdatedAt(): ?string | setEndUpdatedAt(?string endUpdatedAt): void |
| `beginCreatedAt` | `?string` | Optional | If filtering results by their created_at field, the beginning of the requested reporting period, in ISO 8601 format. | getBeginCreatedAt(): ?string | setBeginCreatedAt(?string beginCreatedAt): void |
| `endCreatedAt` | `?string` | Optional | If filtering results by their created_at field, the end of the requested reporting period, in ISO 8601 format. | getEndCreatedAt(): ?string | setEndCreatedAt(?string endCreatedAt): void |
| `status` | [`?string (V1ListEmployeesRequestStatus)`](/doc/models/v1-list-employees-request-status.md) | Optional | - | getStatus(): ?string | setStatus(?string status): void |
| `externalId` | `?string` | Optional | If provided, the endpoint returns only employee entities with the specified external_id. | getExternalId(): ?string | setExternalId(?string externalId): void |
| `limit` | `?int` | Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. | getLimit(): ?int | setLimit(?int limit): void |
| `batchToken` | `?string` | Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. | getBatchToken(): ?string | setBatchToken(?string batchToken): void |

## Example (as JSON)

```json
{
  "order": "DESC",
  "begin_updated_at": "begin_updated_at6",
  "end_updated_at": "end_updated_at4",
  "begin_created_at": "begin_created_at6",
  "end_created_at": "end_created_at8"
}
```

