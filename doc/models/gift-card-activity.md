
# Gift Card Activity

Represents an action performed on a [gift card](../../doc/models/gift-card.md) that affects its state or balance.
A gift card activity contains information about a specific activity type. For example, a `REDEEM` activity
includes a `redeem_activity_details` field that contains information about the redemption.

## Structure

`GiftCardActivity`

## Fields

| Name | Type | Tags | Description | Getter | Setter |
|  --- | --- | --- | --- | --- | --- |
| `id` | `?string` | Optional | The Square-assigned ID of the gift card activity. | getId(): ?string | setId(?string id): void |
| `type` | [`string (GiftCardActivityType)`](../../doc/models/gift-card-activity-type.md) | Required | Indicates the type of [gift card activity](../../doc/models/gift-card-activity.md). | getType(): string | setType(string type): void |
| `locationId` | `string` | Required | The ID of the [business location](../../doc/models/location.md) where the activity occurred. | getLocationId(): string | setLocationId(string locationId): void |
| `createdAt` | `?string` | Optional | The timestamp when the gift card activity was created, in RFC 3339 format. | getCreatedAt(): ?string | setCreatedAt(?string createdAt): void |
| `giftCardId` | `?string` | Optional | The gift card ID. When creating a gift card activity, `gift_card_id` is not required if<br>`gift_card_gan` is specified. | getGiftCardId(): ?string | setGiftCardId(?string giftCardId): void |
| `giftCardGan` | `?string` | Optional | The gift card account number (GAN). When creating a gift card activity, `gift_card_gan`<br>is not required if `gift_card_id` is specified. | getGiftCardGan(): ?string | setGiftCardGan(?string giftCardGan): void |
| `giftCardBalanceMoney` | [`?Money`](../../doc/models/money.md) | Optional | Represents an amount of money. `Money` fields can be signed or unsigned.<br>Fields that do not explicitly define whether they are signed or unsigned are<br>considered unsigned and can only hold positive amounts. For signed fields, the<br>sign of the value indicates the purpose of the money transfer. See<br>[Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)<br>for more information. | getGiftCardBalanceMoney(): ?Money | setGiftCardBalanceMoney(?Money giftCardBalanceMoney): void |
| `loadActivityDetails` | [`?GiftCardActivityLoad`](../../doc/models/gift-card-activity-load.md) | Optional | Represents details about a `LOAD` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getLoadActivityDetails(): ?GiftCardActivityLoad | setLoadActivityDetails(?GiftCardActivityLoad loadActivityDetails): void |
| `activateActivityDetails` | [`?GiftCardActivityActivate`](../../doc/models/gift-card-activity-activate.md) | Optional | Represents details about an `ACTIVATE` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getActivateActivityDetails(): ?GiftCardActivityActivate | setActivateActivityDetails(?GiftCardActivityActivate activateActivityDetails): void |
| `redeemActivityDetails` | [`?GiftCardActivityRedeem`](../../doc/models/gift-card-activity-redeem.md) | Optional | Represents details about a `REDEEM` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getRedeemActivityDetails(): ?GiftCardActivityRedeem | setRedeemActivityDetails(?GiftCardActivityRedeem redeemActivityDetails): void |
| `clearBalanceActivityDetails` | [`?GiftCardActivityClearBalance`](../../doc/models/gift-card-activity-clear-balance.md) | Optional | Represents details about a `CLEAR_BALANCE` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getClearBalanceActivityDetails(): ?GiftCardActivityClearBalance | setClearBalanceActivityDetails(?GiftCardActivityClearBalance clearBalanceActivityDetails): void |
| `deactivateActivityDetails` | [`?GiftCardActivityDeactivate`](../../doc/models/gift-card-activity-deactivate.md) | Optional | Represents details about a `DEACTIVATE` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getDeactivateActivityDetails(): ?GiftCardActivityDeactivate | setDeactivateActivityDetails(?GiftCardActivityDeactivate deactivateActivityDetails): void |
| `adjustIncrementActivityDetails` | [`?GiftCardActivityAdjustIncrement`](../../doc/models/gift-card-activity-adjust-increment.md) | Optional | Represents details about an `ADJUST_INCREMENT` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getAdjustIncrementActivityDetails(): ?GiftCardActivityAdjustIncrement | setAdjustIncrementActivityDetails(?GiftCardActivityAdjustIncrement adjustIncrementActivityDetails): void |
| `adjustDecrementActivityDetails` | [`?GiftCardActivityAdjustDecrement`](../../doc/models/gift-card-activity-adjust-decrement.md) | Optional | Represents details about an `ADJUST_DECREMENT` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getAdjustDecrementActivityDetails(): ?GiftCardActivityAdjustDecrement | setAdjustDecrementActivityDetails(?GiftCardActivityAdjustDecrement adjustDecrementActivityDetails): void |
| `refundActivityDetails` | [`?GiftCardActivityRefund`](../../doc/models/gift-card-activity-refund.md) | Optional | Represents details about a `REFUND` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getRefundActivityDetails(): ?GiftCardActivityRefund | setRefundActivityDetails(?GiftCardActivityRefund refundActivityDetails): void |
| `unlinkedActivityRefundActivityDetails` | [`?GiftCardActivityUnlinkedActivityRefund`](../../doc/models/gift-card-activity-unlinked-activity-refund.md) | Optional | Represents details about an `UNLINKED_ACTIVITY_REFUND` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getUnlinkedActivityRefundActivityDetails(): ?GiftCardActivityUnlinkedActivityRefund | setUnlinkedActivityRefundActivityDetails(?GiftCardActivityUnlinkedActivityRefund unlinkedActivityRefundActivityDetails): void |
| `importActivityDetails` | [`?GiftCardActivityImport`](../../doc/models/gift-card-activity-import.md) | Optional | Represents details about an `IMPORT` [gift card activity type](../../doc/models/gift-card-activity-type.md).<br>This activity type is used when Square imports a third-party gift card, in which case the<br>`gan_source` of the gift card is set to `OTHER`. | getImportActivityDetails(): ?GiftCardActivityImport | setImportActivityDetails(?GiftCardActivityImport importActivityDetails): void |
| `blockActivityDetails` | [`?GiftCardActivityBlock`](../../doc/models/gift-card-activity-block.md) | Optional | Represents details about a `BLOCK` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getBlockActivityDetails(): ?GiftCardActivityBlock | setBlockActivityDetails(?GiftCardActivityBlock blockActivityDetails): void |
| `unblockActivityDetails` | [`?GiftCardActivityUnblock`](../../doc/models/gift-card-activity-unblock.md) | Optional | Represents details about an `UNBLOCK` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getUnblockActivityDetails(): ?GiftCardActivityUnblock | setUnblockActivityDetails(?GiftCardActivityUnblock unblockActivityDetails): void |
| `importReversalActivityDetails` | [`?GiftCardActivityImportReversal`](../../doc/models/gift-card-activity-import-reversal.md) | Optional | Represents details about an `IMPORT_REVERSAL` [gift card activity type](../../doc/models/gift-card-activity-type.md). | getImportReversalActivityDetails(): ?GiftCardActivityImportReversal | setImportReversalActivityDetails(?GiftCardActivityImportReversal importReversalActivityDetails): void |

## Example (as JSON)

```json
{
  "type": "ADJUST_INCREMENT",
  "location_id": "location_id4",
  "gift_card_id": null,
  "gift_card_gan": null,
  "gift_card_balance_money": null,
  "load_activity_details": null,
  "activate_activity_details": null,
  "redeem_activity_details": null,
  "clear_balance_activity_details": null,
  "deactivate_activity_details": null,
  "adjust_increment_activity_details": null,
  "adjust_decrement_activity_details": null,
  "refund_activity_details": null,
  "unlinked_activity_refund_activity_details": null,
  "import_activity_details": null,
  "block_activity_details": null,
  "unblock_activity_details": null,
  "import_reversal_activity_details": null
}
```

