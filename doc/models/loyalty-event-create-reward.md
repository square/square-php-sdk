
# Loyalty Event Create Reward

Provides metadata when the event `type` is `CREATE_REWARD`.

## Structure

`LoyaltyEventCreateReward`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `loyaltyProgramId` | `string` |  | The ID of the [loyalty program](#type-LoyaltyProgram). | getLoyaltyProgramId(): string | setLoyaltyProgramId(string loyaltyProgramId): void |
| `rewardId` | `?string` | Optional | The Square-assigned ID of the created [loyalty reward](#type-LoyaltyReward).<br>This field is returned only if the event source is `LOYALTY_API`. | getRewardId(): ?string | setRewardId(?string rewardId): void |
| `points` | `int` |  | The loyalty points used to create the reward. | getPoints(): int | setPoints(int points): void |

## Example (as JSON)

```json
{
  "loyalty_program_id": "loyalty_program_id0",
  "reward_id": "reward_id4",
  "points": 236
}
```

