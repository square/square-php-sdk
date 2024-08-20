
# Offline Payment Details

Details specific to offline payments.

## Structure

`OfflinePaymentDetails`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `clientCreatedAt` | `?string` | Optional | The client-side timestamp of when the offline payment was created, in RFC 3339 format.<br>**Constraints**: *Maximum Length*: `32` | getClientCreatedAt(): ?string | setClientCreatedAt(?string clientCreatedAt): void |

## Example (as JSON)

```json
{
  "client_created_at": "client_created_at6"
}
```

