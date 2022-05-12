
# List Employees Response

## Structure

`ListEmployeesResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `employees` | [`?(Employee[])`](../../doc/models/employee.md) | Optional | - | getEmployees(): ?array | setEmployees(?array employees): void |
| `cursor` | `?string` | Optional | The token to be used to retrieve the next page of results. | getCursor(): ?string | setCursor(?string cursor): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "employees": null,
  "cursor": null,
  "errors": null
}
```

