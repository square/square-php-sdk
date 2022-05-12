
# Retrieve Employee Response

## Structure

`RetrieveEmployeeResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `employee` | [`?Employee`](../../doc/models/employee.md) | Optional | An employee object that is used by the external API. | getEmployee(): ?Employee | setEmployee(?Employee employee): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "employee": null,
  "errors": null
}
```

