
# Delete Payment Link Response

## Structure

`DeletePaymentLinkResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](../../doc/models/error.md) | Optional | - | getErrors(): ?array | setErrors(?array errors): void |
| `id` | `?string` | Optional | The ID of the link that is deleted. | getId(): ?string | setId(?string id): void |
| `cancelledOrderId` | `?string` | Optional | The ID of the order that is canceled. When a payment link is deleted, Square updates the<br>the `state` (of the order that the checkout link created) to CANCELED. | getCancelledOrderId(): ?string | setCancelledOrderId(?string cancelledOrderId): void |

## Example (as JSON)

```json
{
  "cancelled_order_id": "asx8LgZ6MRzD0fObfkJ6obBmSh4F",
  "id": "MQASNYL6QB6DFCJ3",
  "errors": [
    {
      "category": "AUTHENTICATION_ERROR",
      "code": "REFUND_ALREADY_PENDING",
      "detail": "detail1",
      "field": "field9"
    },
    {
      "category": "INVALID_REQUEST_ERROR",
      "code": "PAYMENT_NOT_REFUNDABLE",
      "detail": "detail2",
      "field": "field0"
    },
    {
      "category": "RATE_LIMIT_ERROR",
      "code": "REFUND_DECLINED",
      "detail": "detail3",
      "field": "field1"
    }
  ]
}
```

