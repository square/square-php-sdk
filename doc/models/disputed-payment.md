
# Disputed Payment

The payment the cardholder disputed.

## Structure

`DisputedPayment`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `paymentId` | `?string` | Optional | Square-generated unique ID of the payment being disputed. | getPaymentId(): ?string | setPaymentId(?string paymentId): void |

## Example (as JSON)

```json
{
  "payment_id": "payment_id0"
}
```

