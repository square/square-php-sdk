
# Loyalty Program

Represents a Square loyalty program. Loyalty programs define how buyers can earn points and redeem points for rewards.
Square sellers can have only one loyalty program, which is created and managed from the Seller Dashboard.
For more information, see [Loyalty Program Overview](https://developer.squareup.com/docs/loyalty/overview).

## Structure

`LoyaltyProgram`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the loyalty program. Updates to<br>the loyalty program do not modify the identifier.<br>**Constraints**: *Maximum Length*: `36` | getId(): ?string | setId(?string id): void |
| `status` | [`?string (LoyaltyProgramStatus)`](../../doc/models/loyalty-program-status.md) | Optional | Indicates whether the program is currently active. | getStatus(): ?string | setStatus(?string status): void |
| `rewardTiers` | [`LoyaltyProgramRewardTier[]`](../../doc/models/loyalty-program-reward-tier.md) | Required | The list of rewards for buyers, sorted by ascending points. | getRewardTiers(): array | setRewardTiers(array rewardTiers): void |
| `expirationPolicy` | [`?LoyaltyProgramExpirationPolicy`](../../doc/models/loyalty-program-expiration-policy.md) | Optional | Describes when the loyalty program expires. | getExpirationPolicy(): ?LoyaltyProgramExpirationPolicy | setExpirationPolicy(?LoyaltyProgramExpirationPolicy expirationPolicy): void |
| `terminology` | [`LoyaltyProgramTerminology`](../../doc/models/loyalty-program-terminology.md) | Required | Represents the naming used for loyalty points. | getTerminology(): LoyaltyProgramTerminology | setTerminology(LoyaltyProgramTerminology terminology): void |
| `locationIds` | `?(string[])` | Optional | The [locations](../../doc/models/location.md) at which the program is active. | getLocationIds(): ?array | setLocationIds(?array locationIds): void |
| `createdAt` | `?string` | Optional | The timestamp when the program was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `updatedAt` | `?string` | Optional | The timestamp when the reward was last updated, in RFC 3339 format. | getUpdatedAt(): ?string | setUpdatedAt(?string updatedAt): void |
| `accrualRules` | [`LoyaltyProgramAccrualRule[]`](../../doc/models/loyalty-program-accrual-rule.md) | Required | Defines how buyers can earn loyalty points from the base loyalty program.<br>To check for associated [loyalty promotions](../../doc/models/loyalty-promotion.md) that enable<br>buyers to earn extra points, call [ListLoyaltyPromotions](../../doc/apis/loyalty.md#list-loyalty-promotions). | getAccrualRules(): array | setAccrualRules(array accrualRules): void |

## Example (as JSON)

```json
{
  "status": null,
  "reward_tiers": [
    {
      "points": 249,
      "definition": null,
      "pricing_rule_reference": null
    },
    {
      "points": 248,
      "definition": null,
      "pricing_rule_reference": null
    }
  ],
  "expiration_policy": null,
  "terminology": {
    "one": "one0",
    "other": "other6"
  },
  "location_ids": null,
  "accrual_rules": [
    {
      "accrual_type": "ITEM_VARIATION",
      "points": null,
      "visit_data": null,
      "spend_data": null,
      "item_variation_data": null,
      "category_data": null
    },
    {
      "accrual_type": "SPEND",
      "points": null,
      "visit_data": null,
      "spend_data": null,
      "item_variation_data": null,
      "category_data": null
    }
  ]
}
```

