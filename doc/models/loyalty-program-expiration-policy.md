
# Loyalty Program Expiration Policy

Describes when the loyalty program expires.

## Structure

`LoyaltyProgramExpirationPolicy`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `expirationDuration` | `string` | Required | The duration of time before points expire, in RFC 3339 format.<br>**Constraints**: *Minimum Length*: `1` | getExpirationDuration(): string | setExpirationDuration(string expirationDuration): void |

## Example (as JSON)

```json
{
  "expiration_duration": "expiration_duration8"
}
```

