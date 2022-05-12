
# Create Payment Link Response

## Structure

`CreatePaymentLinkResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |
| `paymentLink` | [`?PaymentLink`](../../doc/models/payment-link.md) | Optional | - | getPaymentLink(): ?PaymentLink | setPaymentLink(?PaymentLink paymentLink): void |

## Example (as JSON)

```json
{
  "payment_link": {
    "created_at": "2022-04-25T23:58:01Z",
    "id": "PKVT6XGJZXYUP3NZ",
    "order_id": "o4b7saqp4HzhNttf5AJxC0Srjd4F",
    "url": "https://square.link/u/EXAMPLE",
    "version": 1
  }
}
```

