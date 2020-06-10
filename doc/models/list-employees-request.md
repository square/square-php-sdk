## List Employees Request

### Structure

`ListEmployeesRequest`

### Fields

| Name | Type | Tags | Description |
|  --- | --- | --- | --- |
| `locationId` | `?string` | Optional | Filter employees returned to only those that are associated with the specified location. |
| `status` | [`?string (EmployeeStatus)`](/doc/models/employee-status.md) | Optional | The status of the Employee being retrieved. |
| `limit` | `?int` | Optional | The number of employees to be returned on each page. |
| `cursor` | `?string` | Optional | The token required to retrieve the specified page of results. |

### Example (as JSON)

```json
{
  "location_id": null,
  "status": null,
  "limit": null,
  "cursor": null
}
```

