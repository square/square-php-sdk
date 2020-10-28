
# Loyalty Reward

## Structure

`LoyaltyReward`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the loyalty reward. | getId(): ?string | setId(?string id): void |
| `status` | [`?string (LoyaltyRewardStatus)`](/doc/models/loyalty-reward-status.md) | Optional | The status of the loyalty reward. | getStatus(): ?string | setStatus(?string status): void |
| `loyaltyAccountId` | `string` |  | The Square-assigned ID of the [loyalty account](#type-LoyaltyAccount) to which the reward belongs. | getLoyaltyAccountId(): string | setLoyaltyAccountId(string loyaltyAccountId): void |
| `rewardTierId` | `string` |  | The Square-assigned ID of the [reward tier](#type-LoyaltyProgramRewardTier) used to create the reward. | getRewardTierId(): string | setRewardTierId(string rewardTierId): void |
| `points` | `?int` | Optional | The number of loyalty points used for the reward. | getPoints(): ?int | setPoints(?int points): void |
| `orderId` | `?string` | Optional | The Square-assigned ID of the [order](#type-Order) to which the reward is attached. | getOrderId(): ?string | setOrderId(?string orderId): void |
| `createdAt` | `?string` | Optional | The timestamp when the reward was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp when the reward was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `redeemedAt` | `?string` | Optional | The timestamp when the reward was redeemed, in RFC 3339 format. | getRedeemedAt(): ?string | setRedeemedAt(?string redeemedAt): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "status": "DELETED",
  "loyalty_account_id": "loyalty_account_id0",
  "reward_tier_id": "reward_tier_id6",
  "points": 236,
  "order_id": "order_id6",
  "created_at": "created_at2"
}
```

