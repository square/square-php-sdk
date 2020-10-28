
# Loyalty Event Expire Points

Provides metadata when the event `type` is `EXPIRE_POINTS`.

## Structure

`LoyaltyEventExpirePoints`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `loyaltyProgramId` | `string` | The Square-assigned ID of the [loyalty program](#type-LoyaltyProgram). | getLoyaltyProgramId(): string | setLoyaltyProgramId(string loyaltyProgramId): void |
| `points` | `int` | The number of points expired. | getPoints(): int | setPoints(int points): void |

## Example (as JSON)

```json
{
  "loyalty_program_id": "loyalty_program_id0",
  "points": 236
}
```

