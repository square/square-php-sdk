
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
  "employees": [
    {
      "id": "id4",
      "first_name": "first_name4",
      "last_name": "last_name2",
      "email": "email2",
      "phone_number": "phone_number8"
    }
  ],
  "cursor": "cursor8",
  "errors": [
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    },
    {
      "category": "MERCHANT_SUBSCRIPTION_ERROR",
      "code": "INVALID_EXPIRATION",
      "detail": "detail6",
      "field": "field4"
    }
  ]
}
```

