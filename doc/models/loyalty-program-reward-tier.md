
# Loyalty Program Reward Tier

Describes a loyalty program reward tier.

## Structure

`LoyaltyProgramRewardTier`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `id` | `string` | The Square-assigned ID of the reward tier. | getId(): string | setId(string id): void |
| `points` | `int` | The points exchanged for the reward tier. | getPoints(): int | setPoints(int points): void |
| `name` | `string` | The name of the reward tier. | getName(): string | setName(string name): void |
| `definition` | [`LoyaltyProgramRewardDefinition`](/doc/models/loyalty-program-reward-definition.md) | Provides details about the loyalty program reward tier definition. | getDefinition(): LoyaltyProgramRewardDefinition | setDefinition(LoyaltyProgramRewardDefinition definition): void |
| `createdAt` | `string` | The timestamp when the reward tier was created, in RFC 3339 format. | getCreatedAt(): string | setCreatedAt(string createdAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "points": 236,
  "name": "name0",
  "definition": {
    "scope": "ORDER",
    "discount_type": "FIXED_AMOUNT",
    "percentage_discount": "percentage_discount2",
    "catalog_object_ids": [
      "catalog_object_ids6"
    ],
    "fixed_discount_money": {
      "amount": 132,
      "currency": "TRY"
    },
    "max_discount_money": {
      "amount": 176,
      "currency": "MYR"
    }
  },
  "created_at": "created_at2"
}
```

