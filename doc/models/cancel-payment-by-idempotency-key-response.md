
# Cancel Payment by Idempotency Key Response

The return value from the
[CancelPaymentByIdempotencyKey](#endpoint-payments-cancelpaymentbyidempotencykey) endpoint.
On success, `errors` is empty.

## Structure

`CancelPaymentByIdempotencyKeyResponse`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `errors` | [`?(Error[])`](/doc/models/error.md) | Optional | Any errors that occurred during the request. | getErrors(): ?array | setErrors(?array errors): void |

## Example (as JSON)

```json
{}
```

