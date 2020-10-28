
# Order Reward

Represents a reward that may be applied to an order if the necessary
reward tier criteria are met. Rewards are created through the Loyalty API.

## Structure

`OrderReward`

## Fields

| Name | Type | Description | Getter | Setter |
|  --- | --- | --- | --- | --- |
| `id` | `string` | The identifier of the reward. | getId(): string | setId(string id): void |
| `rewardTierId` | `string` | The identifier of the reward tier corresponding to this reward. | getRewardTierId(): string | setRewardTierId(string rewardTierId): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "reward_tier_id": "reward_tier_id6"
}
```

