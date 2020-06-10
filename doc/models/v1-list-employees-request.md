## V1 List Employees Request

### Structure

`V1ListEmployeesRequest`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `order` | [`?string (SortOrder)`](/doc/models/sort-order.md) | Optional | The order (e.g., chronological or alphabetical) in which results from a request are returned. |
| `beginUpdatedAt` | `?string` | Optional | If filtering results by their updated_at field, the beginning of the requested reporting period, in ISO 8601 format |
| `endUpdatedAt` | `?string` | Optional | If filtering results by there updated_at field, the end of the requested reporting period, in ISO 8601 format. |
| `beginCreatedAt` | `?string` | Optional | If filtering results by their created_at field, the beginning of the requested reporting period, in ISO 8601 format. |
| `endCreatedAt` | `?string` | Optional | If filtering results by their created_at field, the end of the requested reporting period, in ISO 8601 format. |
| `status` | [`?string (V1ListEmployeesRequestStatus)`](/doc/models/v1-list-employees-request-status.md) | Optional | -  |
| `externalId` | `?string` | Optional | If provided, the endpoint returns only employee entities with the specified external_id. |
| `limit` | `?int` | Optional | The maximum integer number of employee entities to return in a single response. Default 100, maximum 200. |
| `batchToken` | `?string` | Optional | A pagination cursor to retrieve the next set of results for your<br>original query to the endpoint. |

### Example (as JSON)

```json
{
  "order": null,
  "begin_updated_at": null,
  "end_updated_at": null,
  "begin_created_at": null,
  "end_created_at": null,
  "status": null,
  "external_id": null,
  "limit": null,
  "batch_token": null
}
```

