
# List Employee Wages Request

A request for a set of `EmployeeWage` objects

## Structure

`ListEmployeeWagesRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `employeeId` | `?string` | Optional | Filter wages returned to only those that are associated with the specified employee. | getEmployeeId(): ?string | setEmployeeId(?string employeeId): void |
| `limit` | `?int` | Optional | Maximum number of Employee Wages to return per page. Can range between<br>1 and 200. The default is the maximum at 200.<br>**Constraints**: `>= 1`, `<= 200` | getLimit(): ?int | setLimit(?int limit): void |
| `cursor` | `?string` | Optional | Pointer to the next page of Employee Wage results to fetch. | getCursor(): ?string | setCursor(?string cursor): void |

## Example (as JSON)

```json
{
  "employee_id": "employee_id0",
  "limit": 172,
  "cursor": "cursor6"
}
```

