
# Square Account Details

Additional details about Square Account payments.

## Structure

`SquareAccountDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `paymentSourceToken` | `?string` | Optional | Unique identifier for the payment source used for this payment.<br>**Constraints**: *Maximum Length*: `255` | getPaymentSourceToken(): ?string | setPaymentSourceToken(?string paymentSourceToken): void |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Information about errors encountered during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{
  "payment_source_token": "payment_source_token8",
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

