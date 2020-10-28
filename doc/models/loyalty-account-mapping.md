
# Loyalty Account Mapping

Associates a loyalty account with the buyer's phone number.
For more information, see
[Loyalty Overview](https://developer.squareup.com/docs/docs/loyalty/overview).

## Structure

`LoyaltyAccountMapping`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the mapping. | getId(): ?string | setId(?string id): void |
| `type` | `string` |  | The type of mapping.<br>*Default: `'PHONE'`* | getType(): string | setType(string type): void |
| `value` | `string` |  | The phone number, in E.164 format. For example, "+14155551111". | getValue(): string | setValue(string value): void |
| `createdAt` | `?string` | Optional | The timestamp when the mapping was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "type": "type0",
  "value": "value2",
  "created_at": "created_at2"
}
```

