<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an action performed on a [gift card](entity:GiftCard) that affects its state or balance.
 * A gift card activity contains information about a specific activity type. For example, a `REDEEM` activity
 * includes a `redeem_activity_details` field that contains information about the redemption.
 */
class GiftCardActivity extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the gift card activity.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The type of gift card activity.
     * See [Type](#type-type) for possible values
     *
     * @var value-of<GiftCardActivityType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $locationId The ID of the [business location](entity:Location) where the activity occurred.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * @var ?string $createdAt The timestamp when the gift card activity was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * The gift card ID. When creating a gift card activity, `gift_card_id` is not required if
     * `gift_card_gan` is specified.
     *
     * @var ?string $giftCardId
     */
    #[JsonProperty('gift_card_id')]
    private ?string $giftCardId;

    /**
     * The gift card account number (GAN). When creating a gift card activity, `gift_card_gan`
     * is not required if `gift_card_id` is specified.
     *
     * @var ?string $giftCardGan
     */
    #[JsonProperty('gift_card_gan')]
    private ?string $giftCardGan;

    /**
     * @var ?Money $giftCardBalanceMoney The final balance on the gift card after the action is completed.
     */
    #[JsonProperty('gift_card_balance_money')]
    private ?Money $giftCardBalanceMoney;

    /**
     * @var ?GiftCardActivityLoad $loadActivityDetails Additional details about a `LOAD` activity, which is used to reload money onto a gift card.
     */
    #[JsonProperty('load_activity_details')]
    private ?GiftCardActivityLoad $loadActivityDetails;

    /**
     * Additional details about an `ACTIVATE` activity, which is used to activate a gift card with
     * an initial balance.
     *
     * @var ?GiftCardActivityActivate $activateActivityDetails
     */
    #[JsonProperty('activate_activity_details')]
    private ?GiftCardActivityActivate $activateActivityDetails;

    /**
     * Additional details about a `REDEEM` activity, which is used to redeem a gift card for a purchase.
     *
     * For applications that process payments using the Square Payments API, Square creates a `REDEEM` activity that
     * updates the gift card balance after the corresponding [CreatePayment](api-endpoint:Payments-CreatePayment)
     * request is completed. Applications that use a custom payment processing system must call
     * [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) to create the `REDEEM` activity.
     *
     * @var ?GiftCardActivityRedeem $redeemActivityDetails
     */
    #[JsonProperty('redeem_activity_details')]
    private ?GiftCardActivityRedeem $redeemActivityDetails;

    /**
     * @var ?GiftCardActivityClearBalance $clearBalanceActivityDetails Additional details about a `CLEAR_BALANCE` activity, which is used to set the balance of a gift card to zero.
     */
    #[JsonProperty('clear_balance_activity_details')]
    private ?GiftCardActivityClearBalance $clearBalanceActivityDetails;

    /**
     * @var ?GiftCardActivityDeactivate $deactivateActivityDetails Additional details about a `DEACTIVATE` activity, which is used to deactivate a gift card.
     */
    #[JsonProperty('deactivate_activity_details')]
    private ?GiftCardActivityDeactivate $deactivateActivityDetails;

    /**
     * Additional details about an `ADJUST_INCREMENT` activity, which is used to add money to a gift card
     * outside of a typical `ACTIVATE`, `LOAD`, or `REFUND` activity flow.
     *
     * @var ?GiftCardActivityAdjustIncrement $adjustIncrementActivityDetails
     */
    #[JsonProperty('adjust_increment_activity_details')]
    private ?GiftCardActivityAdjustIncrement $adjustIncrementActivityDetails;

    /**
     * Additional details about an `ADJUST_DECREMENT` activity, which is used to deduct money from a gift
     * card outside of a typical `REDEEM` activity flow.
     *
     * @var ?GiftCardActivityAdjustDecrement $adjustDecrementActivityDetails
     */
    #[JsonProperty('adjust_decrement_activity_details')]
    private ?GiftCardActivityAdjustDecrement $adjustDecrementActivityDetails;

    /**
     * Additional details about a `REFUND` activity, which is used to add money to a gift card when
     * refunding a payment.
     *
     * For applications that refund payments to a gift card using the Square Refunds API, Square automatically
     * creates a `REFUND` activity that updates the gift card balance after a [RefundPayment](api-endpoint:Refunds-RefundPayment)
     * request is completed. Applications that use a custom processing system must call
     * [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) to create the `REFUND` activity.
     *
     * @var ?GiftCardActivityRefund $refundActivityDetails
     */
    #[JsonProperty('refund_activity_details')]
    private ?GiftCardActivityRefund $refundActivityDetails;

    /**
     * Additional details about an `UNLINKED_ACTIVITY_REFUND` activity. This activity is used to add money
     * to a gift card when refunding a payment that was processed using a custom payment processing system
     * and not linked to the gift card.
     *
     * @var ?GiftCardActivityUnlinkedActivityRefund $unlinkedActivityRefundActivityDetails
     */
    #[JsonProperty('unlinked_activity_refund_activity_details')]
    private ?GiftCardActivityUnlinkedActivityRefund $unlinkedActivityRefundActivityDetails;

    /**
     * Additional details about an `IMPORT` activity, which Square uses to import a third-party
     * gift card with a balance.
     *
     * @var ?GiftCardActivityImport $importActivityDetails
     */
    #[JsonProperty('import_activity_details')]
    private ?GiftCardActivityImport $importActivityDetails;

    /**
     * @var ?GiftCardActivityBlock $blockActivityDetails Additional details about a `BLOCK` activity, which Square uses to temporarily block a gift card.
     */
    #[JsonProperty('block_activity_details')]
    private ?GiftCardActivityBlock $blockActivityDetails;

    /**
     * @var ?GiftCardActivityUnblock $unblockActivityDetails Additional details about an `UNBLOCK` activity, which Square uses to unblock a gift card.
     */
    #[JsonProperty('unblock_activity_details')]
    private ?GiftCardActivityUnblock $unblockActivityDetails;

    /**
     * Additional details about an `IMPORT_REVERSAL` activity, which Square uses to reverse the
     * import of a third-party gift card.
     *
     * @var ?GiftCardActivityImportReversal $importReversalActivityDetails
     */
    #[JsonProperty('import_reversal_activity_details')]
    private ?GiftCardActivityImportReversal $importReversalActivityDetails;

    /**
     * Additional details about a `TRANSFER_BALANCE_TO` activity, which Square uses to add money to
     * a gift card as the result of a transfer from another gift card.
     *
     * @var ?GiftCardActivityTransferBalanceTo $transferBalanceToActivityDetails
     */
    #[JsonProperty('transfer_balance_to_activity_details')]
    private ?GiftCardActivityTransferBalanceTo $transferBalanceToActivityDetails;

    /**
     * Additional details about a `TRANSFER_BALANCE_FROM` activity, which Square uses to deduct money from
     * a gift as the result of a transfer to another gift card.
     *
     * @var ?GiftCardActivityTransferBalanceFrom $transferBalanceFromActivityDetails
     */
    #[JsonProperty('transfer_balance_from_activity_details')]
    private ?GiftCardActivityTransferBalanceFrom $transferBalanceFromActivityDetails;

    /**
     * @param array{
     *   type: value-of<GiftCardActivityType>,
     *   locationId: string,
     *   id?: ?string,
     *   createdAt?: ?string,
     *   giftCardId?: ?string,
     *   giftCardGan?: ?string,
     *   giftCardBalanceMoney?: ?Money,
     *   loadActivityDetails?: ?GiftCardActivityLoad,
     *   activateActivityDetails?: ?GiftCardActivityActivate,
     *   redeemActivityDetails?: ?GiftCardActivityRedeem,
     *   clearBalanceActivityDetails?: ?GiftCardActivityClearBalance,
     *   deactivateActivityDetails?: ?GiftCardActivityDeactivate,
     *   adjustIncrementActivityDetails?: ?GiftCardActivityAdjustIncrement,
     *   adjustDecrementActivityDetails?: ?GiftCardActivityAdjustDecrement,
     *   refundActivityDetails?: ?GiftCardActivityRefund,
     *   unlinkedActivityRefundActivityDetails?: ?GiftCardActivityUnlinkedActivityRefund,
     *   importActivityDetails?: ?GiftCardActivityImport,
     *   blockActivityDetails?: ?GiftCardActivityBlock,
     *   unblockActivityDetails?: ?GiftCardActivityUnblock,
     *   importReversalActivityDetails?: ?GiftCardActivityImportReversal,
     *   transferBalanceToActivityDetails?: ?GiftCardActivityTransferBalanceTo,
     *   transferBalanceFromActivityDetails?: ?GiftCardActivityTransferBalanceFrom,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'];
        $this->locationId = $values['locationId'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->giftCardId = $values['giftCardId'] ?? null;
        $this->giftCardGan = $values['giftCardGan'] ?? null;
        $this->giftCardBalanceMoney = $values['giftCardBalanceMoney'] ?? null;
        $this->loadActivityDetails = $values['loadActivityDetails'] ?? null;
        $this->activateActivityDetails = $values['activateActivityDetails'] ?? null;
        $this->redeemActivityDetails = $values['redeemActivityDetails'] ?? null;
        $this->clearBalanceActivityDetails = $values['clearBalanceActivityDetails'] ?? null;
        $this->deactivateActivityDetails = $values['deactivateActivityDetails'] ?? null;
        $this->adjustIncrementActivityDetails = $values['adjustIncrementActivityDetails'] ?? null;
        $this->adjustDecrementActivityDetails = $values['adjustDecrementActivityDetails'] ?? null;
        $this->refundActivityDetails = $values['refundActivityDetails'] ?? null;
        $this->unlinkedActivityRefundActivityDetails = $values['unlinkedActivityRefundActivityDetails'] ?? null;
        $this->importActivityDetails = $values['importActivityDetails'] ?? null;
        $this->blockActivityDetails = $values['blockActivityDetails'] ?? null;
        $this->unblockActivityDetails = $values['unblockActivityDetails'] ?? null;
        $this->importReversalActivityDetails = $values['importReversalActivityDetails'] ?? null;
        $this->transferBalanceToActivityDetails = $values['transferBalanceToActivityDetails'] ?? null;
        $this->transferBalanceFromActivityDetails = $values['transferBalanceFromActivityDetails'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return value-of<GiftCardActivityType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<GiftCardActivityType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGiftCardId(): ?string
    {
        return $this->giftCardId;
    }

    /**
     * @param ?string $value
     */
    public function setGiftCardId(?string $value = null): self
    {
        $this->giftCardId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGiftCardGan(): ?string
    {
        return $this->giftCardGan;
    }

    /**
     * @param ?string $value
     */
    public function setGiftCardGan(?string $value = null): self
    {
        $this->giftCardGan = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getGiftCardBalanceMoney(): ?Money
    {
        return $this->giftCardBalanceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setGiftCardBalanceMoney(?Money $value = null): self
    {
        $this->giftCardBalanceMoney = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityLoad
     */
    public function getLoadActivityDetails(): ?GiftCardActivityLoad
    {
        return $this->loadActivityDetails;
    }

    /**
     * @param ?GiftCardActivityLoad $value
     */
    public function setLoadActivityDetails(?GiftCardActivityLoad $value = null): self
    {
        $this->loadActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityActivate
     */
    public function getActivateActivityDetails(): ?GiftCardActivityActivate
    {
        return $this->activateActivityDetails;
    }

    /**
     * @param ?GiftCardActivityActivate $value
     */
    public function setActivateActivityDetails(?GiftCardActivityActivate $value = null): self
    {
        $this->activateActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityRedeem
     */
    public function getRedeemActivityDetails(): ?GiftCardActivityRedeem
    {
        return $this->redeemActivityDetails;
    }

    /**
     * @param ?GiftCardActivityRedeem $value
     */
    public function setRedeemActivityDetails(?GiftCardActivityRedeem $value = null): self
    {
        $this->redeemActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityClearBalance
     */
    public function getClearBalanceActivityDetails(): ?GiftCardActivityClearBalance
    {
        return $this->clearBalanceActivityDetails;
    }

    /**
     * @param ?GiftCardActivityClearBalance $value
     */
    public function setClearBalanceActivityDetails(?GiftCardActivityClearBalance $value = null): self
    {
        $this->clearBalanceActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityDeactivate
     */
    public function getDeactivateActivityDetails(): ?GiftCardActivityDeactivate
    {
        return $this->deactivateActivityDetails;
    }

    /**
     * @param ?GiftCardActivityDeactivate $value
     */
    public function setDeactivateActivityDetails(?GiftCardActivityDeactivate $value = null): self
    {
        $this->deactivateActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityAdjustIncrement
     */
    public function getAdjustIncrementActivityDetails(): ?GiftCardActivityAdjustIncrement
    {
        return $this->adjustIncrementActivityDetails;
    }

    /**
     * @param ?GiftCardActivityAdjustIncrement $value
     */
    public function setAdjustIncrementActivityDetails(?GiftCardActivityAdjustIncrement $value = null): self
    {
        $this->adjustIncrementActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityAdjustDecrement
     */
    public function getAdjustDecrementActivityDetails(): ?GiftCardActivityAdjustDecrement
    {
        return $this->adjustDecrementActivityDetails;
    }

    /**
     * @param ?GiftCardActivityAdjustDecrement $value
     */
    public function setAdjustDecrementActivityDetails(?GiftCardActivityAdjustDecrement $value = null): self
    {
        $this->adjustDecrementActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityRefund
     */
    public function getRefundActivityDetails(): ?GiftCardActivityRefund
    {
        return $this->refundActivityDetails;
    }

    /**
     * @param ?GiftCardActivityRefund $value
     */
    public function setRefundActivityDetails(?GiftCardActivityRefund $value = null): self
    {
        $this->refundActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityUnlinkedActivityRefund
     */
    public function getUnlinkedActivityRefundActivityDetails(): ?GiftCardActivityUnlinkedActivityRefund
    {
        return $this->unlinkedActivityRefundActivityDetails;
    }

    /**
     * @param ?GiftCardActivityUnlinkedActivityRefund $value
     */
    public function setUnlinkedActivityRefundActivityDetails(?GiftCardActivityUnlinkedActivityRefund $value = null): self
    {
        $this->unlinkedActivityRefundActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityImport
     */
    public function getImportActivityDetails(): ?GiftCardActivityImport
    {
        return $this->importActivityDetails;
    }

    /**
     * @param ?GiftCardActivityImport $value
     */
    public function setImportActivityDetails(?GiftCardActivityImport $value = null): self
    {
        $this->importActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityBlock
     */
    public function getBlockActivityDetails(): ?GiftCardActivityBlock
    {
        return $this->blockActivityDetails;
    }

    /**
     * @param ?GiftCardActivityBlock $value
     */
    public function setBlockActivityDetails(?GiftCardActivityBlock $value = null): self
    {
        $this->blockActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityUnblock
     */
    public function getUnblockActivityDetails(): ?GiftCardActivityUnblock
    {
        return $this->unblockActivityDetails;
    }

    /**
     * @param ?GiftCardActivityUnblock $value
     */
    public function setUnblockActivityDetails(?GiftCardActivityUnblock $value = null): self
    {
        $this->unblockActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityImportReversal
     */
    public function getImportReversalActivityDetails(): ?GiftCardActivityImportReversal
    {
        return $this->importReversalActivityDetails;
    }

    /**
     * @param ?GiftCardActivityImportReversal $value
     */
    public function setImportReversalActivityDetails(?GiftCardActivityImportReversal $value = null): self
    {
        $this->importReversalActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityTransferBalanceTo
     */
    public function getTransferBalanceToActivityDetails(): ?GiftCardActivityTransferBalanceTo
    {
        return $this->transferBalanceToActivityDetails;
    }

    /**
     * @param ?GiftCardActivityTransferBalanceTo $value
     */
    public function setTransferBalanceToActivityDetails(?GiftCardActivityTransferBalanceTo $value = null): self
    {
        $this->transferBalanceToActivityDetails = $value;
        return $this;
    }

    /**
     * @return ?GiftCardActivityTransferBalanceFrom
     */
    public function getTransferBalanceFromActivityDetails(): ?GiftCardActivityTransferBalanceFrom
    {
        return $this->transferBalanceFromActivityDetails;
    }

    /**
     * @param ?GiftCardActivityTransferBalanceFrom $value
     */
    public function setTransferBalanceFromActivityDetails(?GiftCardActivityTransferBalanceFrom $value = null): self
    {
        $this->transferBalanceFromActivityDetails = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
