
# Create Terminal Refund Request

## Structure

`CreateTerminalRefundRequest`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `idempotencyKey` | `string` |  | A unique string that identifies this `CreateRefund` request. Keys can be any valid string but<br>must be unique for every `CreateRefund` request.<br><br>See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more information. | getIdempotencyKey(): string | setIdempotencyKey(string idempotencyKey): void |
| `refund` | [`?TerminalRefund`](/doc/models/terminal-refund.md) | Optional | - | getRefund(): ?TerminalRefund | setRefund(?TerminalRefund refund): void |

## Example (as JSON)

```json
{
  "idempotency_key": "idempotency_key6",
  "refund": {
    "id": "id8",
    "refund_id": "refund_id2",
    "payment_id": "payment_id8",
    "order_id": "order_id2",
    "amount_money": {
      "amount": 120,
      "currency": "AUD"
    },
    "reason": "reason4",
    "device_id": "device_id4"
  }
}
```

