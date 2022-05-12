
# List Employees Request

## Structure

`ListEmployeesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `locationId` | `?string` | Optional | - | getLocationId(): ?string | setLocationId(?string locationId): void |
| `status` | [`?string (EmployeeStatus)`](../../doc/models/employee-status.md) | Optional | The status of the Employee being retrieved. | getStatus(): ?string | setStatus(?string status): void |
| `limit` | `?int` | Optional | The number of employees to be returned on each page. | getLimit(): ?int | setLimit(?int limit): void |
| `cursor` | `?string` | Optional | The token required to retrieve the specified page of results. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "location_id": null,
  "status": null,
  "limit": null,
  "cursor": null
}
```

