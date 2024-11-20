
# Retrieve Employee Response

## Structure

`RetrieveEmployeeResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `employee` | [`?Employee`](../../doc/models/employee.md) | Optional | An employee object that is used by the external API.<br><br>DEPRECATED at version 2020-08-26. Replaced by [TeamMember](entity:TeamMember). | getEmployee(): ?Employee | setEmployee(?Employee employee): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "employee": {
    "id": "id8",
    "first_name": "first_name8",
    "last_name": "last_name6",
    "email": "email8",
    "phone_number": "phone_number6"
  },
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
    }
  ]
}
```

