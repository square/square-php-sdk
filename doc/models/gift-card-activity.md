
# Gift Card Activity

Represents an action performed on a gift card that affects its state or balance.

## Structure

`GiftCardActivity`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The unique ID of the gift card activity. | getId(): ?string | setId(?string id): void |
| `type` | [`string (GiftCardActivityType)`](/doc/models/gift-card-activity-type.md) | Required | - | getType(): string | setType(string type): void |
| `locationId` | `string` | Required | The ID of the location at which the activity occurred. | getLocationId(): string | setLocationId(string locationId): void |
| `createdAt` | `?string` | Optional | The timestamp when the gift card activity was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `giftCardId` | `?string` | Optional | The gift card ID. The ID is not required if a GAN is present. | getGiftCardId(): ?string | setGiftCardId(?string giftCardId): void |
| `giftCardGan` | `?string` | Optional | The gift card GAN. The GAN is not required if `gift_card_id` is present. | getGiftCardGan(): ?string | setGiftCardGan(?string giftCardGan): void |
| `giftCardBalanceMoney` | [`?Money`](/doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getGiftCardBalanceMoney(): ?Money | setGiftCardBalanceMoney(?Money giftCardBalanceMoney): void |
| `loadActivityDetails` | [`?GiftCardActivityLoad`](/doc/models/gift-card-activity-load.md) | Optional | Present only when `GiftCardActivityType` is LOAD. | getLoadActivityDetails(): ?GiftCardActivityLoad | setLoadActivityDetails(?GiftCardActivityLoad loadActivityDetails): void |
| `activateActivityDetails` | [`?GiftCardActivityActivate`](/doc/models/gift-card-activity-activate.md) | Optional | Describes a gift card activity of the ACTIVATE type. | getActivateActivityDetails(): ?GiftCardActivityActivate | setActivateActivityDetails(?GiftCardActivityActivate activateActivityDetails): void |
| `redeemActivityDetails` | [`?GiftCardActivityRedeem`](/doc/models/gift-card-activity-redeem.md) | Optional | Present only when `GiftCardActivityType` is REDEEM. | getRedeemActivityDetails(): ?GiftCardActivityRedeem | setRedeemActivityDetails(?GiftCardActivityRedeem redeemActivityDetails): void |
| `clearBalanceActivityDetails` | [`?GiftCardActivityClearBalance`](/doc/models/gift-card-activity-clear-balance.md) | Optional | Describes a gift card activity of the CLEAR_BALANCE type. | getClearBalanceActivityDetails(): ?GiftCardActivityClearBalance | setClearBalanceActivityDetails(?GiftCardActivityClearBalance clearBalanceActivityDetails): void |
| `deactivateActivityDetails` | [`?GiftCardActivityDeactivate`](/doc/models/gift-card-activity-deactivate.md) | Optional | Describes a gift card activity of the DEACTIVATE type. | getDeactivateActivityDetails(): ?GiftCardActivityDeactivate | setDeactivateActivityDetails(?GiftCardActivityDeactivate deactivateActivityDetails): void |
| `adjustIncrementActivityDetails` | [`?GiftCardActivityAdjustIncrement`](/doc/models/gift-card-activity-adjust-increment.md) | Optional | Describes a gift card activity of the ADJUST_INCREMENT type. | getAdjustIncrementActivityDetails(): ?GiftCardActivityAdjustIncrement | setAdjustIncrementActivityDetails(?GiftCardActivityAdjustIncrement adjustIncrementActivityDetails): void |
| `adjustDecrementActivityDetails` | [`?GiftCardActivityAdjustDecrement`](/doc/models/gift-card-activity-adjust-decrement.md) | Optional | Describes a gift card activity of the ADJUST_DECREMENT type. | getAdjustDecrementActivityDetails(): ?GiftCardActivityAdjustDecrement | setAdjustDecrementActivityDetails(?GiftCardActivityAdjustDecrement adjustDecrementActivityDetails): void |
| `refundActivityDetails` | [`?GiftCardActivityRefund`](/doc/models/gift-card-activity-refund.md) | Optional | Present only when `GiftCardActivityType` is REFUND. | getRefundActivityDetails(): ?GiftCardActivityRefund | setRefundActivityDetails(?GiftCardActivityRefund refundActivityDetails): void |
| `unlinkedActivityRefundActivityDetails` | [`?GiftCardActivityUnlinkedActivityRefund`](/doc/models/gift-card-activity-unlinked-activity-refund.md) | Optional | Present only when `GiftCardActivityType` is UNLINKED_ACTIVITY_REFUND. | getUnlinkedActivityRefundActivityDetails(): ?GiftCardActivityUnlinkedActivityRefund | setUnlinkedActivityRefundActivityDetails(?GiftCardActivityUnlinkedActivityRefund unlinkedActivityRefundActivityDetails): void |
| `importActivityDetails` | [`?GiftCardActivityImport`](/doc/models/gift-card-activity-import.md) | Optional | Describes a gift card activity of the IMPORT type and the `GiftCardGANSource` is OTHER<br>(a third-party gift card). | getImportActivityDetails(): ?GiftCardActivityImport | setImportActivityDetails(?GiftCardActivityImport importActivityDetails): void |
| `blockActivityDetails` | [`?GiftCardActivityBlock`](/doc/models/gift-card-activity-block.md) | Optional | Describes a gift card activity of the BLOCK type. | getBlockActivityDetails(): ?GiftCardActivityBlock | setBlockActivityDetails(?GiftCardActivityBlock blockActivityDetails): void |
| `unblockActivityDetails` | [`?GiftCardActivityUnblock`](/doc/models/gift-card-activity-unblock.md) | Optional | Present only when `GiftCardActivityType` is UNBLOCK. | getUnblockActivityDetails(): ?GiftCardActivityUnblock | setUnblockActivityDetails(?GiftCardActivityUnblock unblockActivityDetails): void |
| `importReversalActivityDetails` | [`?GiftCardActivityImportReversal`](/doc/models/gift-card-activity-import-reversal.md) | Optional | Present only when GiftCardActivityType is IMPORT_REVERSAL and GiftCardGANSource is OTHER | getImportReversalActivityDetails(): ?GiftCardActivityImportReversal | setImportReversalActivityDetails(?GiftCardActivityImportReversal importReversalActivityDetails): void |

## Example (as JSON)

```json
{
  "id": "id0",
  "type": "ADJUST_INCREMENT",
  "location_id": "location_id4",
  "created_at": "created_at2",
  "gift_card_id": "gift_card_id8",
  "gift_card_gan": "gift_card_gan6",
  "gift_card_balance_money": {
    "amount": 82,
    "currency": "LSL"
  }
}
```

