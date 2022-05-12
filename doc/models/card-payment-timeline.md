
# Card Payment Timeline

The timeline for card payments.

## Structure

`CardPaymentTimeline`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `authorizedAt` | `?string` | Optional | The timestamp when the payment was authorized, in RFC 3339 format. | getAuthorizedAt(): ?string | setAuthorizedAt(?string authorizedAt): void |
| `capturedAt` | `?string` | Optional | The timestamp when the payment was captured, in RFC 3339 format. | getCapturedAt(): ?string | setCapturedAt(?string capturedAt): void |
| `voidedAt` | `?string` | Optional | The timestamp when the payment was voided, in RFC 3339 format. | getVoidedAt(): ?string | setVoidedAt(?string voidedAt): void |

## Example (as JSON)

```json
{
  "authorized_at": null,
  "captured_at": null,
  "voided_at": null
}
```

