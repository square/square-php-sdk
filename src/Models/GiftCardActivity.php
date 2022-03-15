<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents an action performed on a gift card that affects its state or balance.
 */
class GiftCardActivity implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $giftCardId;

    /**
     * @var string|null
     */
    private $giftCardGan;

    /**
     * @var Money|null
     */
    private $giftCardBalanceMoney;

    /**
     * @var GiftCardActivityLoad|null
     */
    private $loadActivityDetails;

    /**
     * @var GiftCardActivityActivate|null
     */
    private $activateActivityDetails;

    /**
     * @var GiftCardActivityRedeem|null
     */
    private $redeemActivityDetails;

    /**
     * @var GiftCardActivityClearBalance|null
     */
    private $clearBalanceActivityDetails;

    /**
     * @var GiftCardActivityDeactivate|null
     */
    private $deactivateActivityDetails;

    /**
     * @var GiftCardActivityAdjustIncrement|null
     */
    private $adjustIncrementActivityDetails;

    /**
     * @var GiftCardActivityAdjustDecrement|null
     */
    private $adjustDecrementActivityDetails;

    /**
     * @var GiftCardActivityRefund|null
     */
    private $refundActivityDetails;

    /**
     * @var GiftCardActivityUnlinkedActivityRefund|null
     */
    private $unlinkedActivityRefundActivityDetails;

    /**
     * @var GiftCardActivityImport|null
     */
    private $importActivityDetails;

    /**
     * @var GiftCardActivityBlock|null
     */
    private $blockActivityDetails;

    /**
     * @var GiftCardActivityUnblock|null
     */
    private $unblockActivityDetails;

    /**
     * @var GiftCardActivityImportReversal|null
     */
    private $importReversalActivityDetails;

    /**
     * @param string $type
     * @param string $locationId
     */
    public function __construct(string $type, string $locationId)
    {
        $this->type = $type;
        $this->locationId = $locationId;
    }

    /**
     * Returns Id.
     *
     * The unique ID of the gift card activity.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The unique ID of the gift card activity.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     *
     * Indicates the gift card activity type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates the gift card activity type.
     *
     * @required
     * @maps type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location at which the activity occurred.
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location at which the activity occurred.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId(string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the gift card activity was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the gift card activity was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Gift Card Id.
     *
     * The gift card ID. The ID is not required if a GAN is present.
     */
    public function getGiftCardId(): ?string
    {
        return $this->giftCardId;
    }

    /**
     * Sets Gift Card Id.
     *
     * The gift card ID. The ID is not required if a GAN is present.
     *
     * @maps gift_card_id
     */
    public function setGiftCardId(?string $giftCardId): void
    {
        $this->giftCardId = $giftCardId;
    }

    /**
     * Returns Gift Card Gan.
     *
     * The gift card GAN. The GAN is not required if `gift_card_id` is present.
     */
    public function getGiftCardGan(): ?string
    {
        return $this->giftCardGan;
    }

    /**
     * Sets Gift Card Gan.
     *
     * The gift card GAN. The GAN is not required if `gift_card_id` is present.
     *
     * @maps gift_card_gan
     */
    public function setGiftCardGan(?string $giftCardGan): void
    {
        $this->giftCardGan = $giftCardGan;
    }

    /**
     * Returns Gift Card Balance Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getGiftCardBalanceMoney(): ?Money
    {
        return $this->giftCardBalanceMoney;
    }

    /**
     * Sets Gift Card Balance Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps gift_card_balance_money
     */
    public function setGiftCardBalanceMoney(?Money $giftCardBalanceMoney): void
    {
        $this->giftCardBalanceMoney = $giftCardBalanceMoney;
    }

    /**
     * Returns Load Activity Details.
     *
     * Present only when `GiftCardActivityType` is LOAD.
     */
    public function getLoadActivityDetails(): ?GiftCardActivityLoad
    {
        return $this->loadActivityDetails;
    }

    /**
     * Sets Load Activity Details.
     *
     * Present only when `GiftCardActivityType` is LOAD.
     *
     * @maps load_activity_details
     */
    public function setLoadActivityDetails(?GiftCardActivityLoad $loadActivityDetails): void
    {
        $this->loadActivityDetails = $loadActivityDetails;
    }

    /**
     * Returns Activate Activity Details.
     *
     * Describes a gift card activity of the ACTIVATE type.
     */
    public function getActivateActivityDetails(): ?GiftCardActivityActivate
    {
        return $this->activateActivityDetails;
    }

    /**
     * Sets Activate Activity Details.
     *
     * Describes a gift card activity of the ACTIVATE type.
     *
     * @maps activate_activity_details
     */
    public function setActivateActivityDetails(?GiftCardActivityActivate $activateActivityDetails): void
    {
        $this->activateActivityDetails = $activateActivityDetails;
    }

    /**
     * Returns Redeem Activity Details.
     *
     * Present only when `GiftCardActivityType` is REDEEM.
     */
    public function getRedeemActivityDetails(): ?GiftCardActivityRedeem
    {
        return $this->redeemActivityDetails;
    }

    /**
     * Sets Redeem Activity Details.
     *
     * Present only when `GiftCardActivityType` is REDEEM.
     *
     * @maps redeem_activity_details
     */
    public function setRedeemActivityDetails(?GiftCardActivityRedeem $redeemActivityDetails): void
    {
        $this->redeemActivityDetails = $redeemActivityDetails;
    }

    /**
     * Returns Clear Balance Activity Details.
     *
     * Describes a gift card activity of the CLEAR_BALANCE type.
     */
    public function getClearBalanceActivityDetails(): ?GiftCardActivityClearBalance
    {
        return $this->clearBalanceActivityDetails;
    }

    /**
     * Sets Clear Balance Activity Details.
     *
     * Describes a gift card activity of the CLEAR_BALANCE type.
     *
     * @maps clear_balance_activity_details
     */
    public function setClearBalanceActivityDetails(?GiftCardActivityClearBalance $clearBalanceActivityDetails): void
    {
        $this->clearBalanceActivityDetails = $clearBalanceActivityDetails;
    }

    /**
     * Returns Deactivate Activity Details.
     *
     * Describes a gift card activity of the DEACTIVATE type.
     */
    public function getDeactivateActivityDetails(): ?GiftCardActivityDeactivate
    {
        return $this->deactivateActivityDetails;
    }

    /**
     * Sets Deactivate Activity Details.
     *
     * Describes a gift card activity of the DEACTIVATE type.
     *
     * @maps deactivate_activity_details
     */
    public function setDeactivateActivityDetails(?GiftCardActivityDeactivate $deactivateActivityDetails): void
    {
        $this->deactivateActivityDetails = $deactivateActivityDetails;
    }

    /**
     * Returns Adjust Increment Activity Details.
     *
     * Describes a gift card activity of the ADJUST_INCREMENT type.
     */
    public function getAdjustIncrementActivityDetails(): ?GiftCardActivityAdjustIncrement
    {
        return $this->adjustIncrementActivityDetails;
    }

    /**
     * Sets Adjust Increment Activity Details.
     *
     * Describes a gift card activity of the ADJUST_INCREMENT type.
     *
     * @maps adjust_increment_activity_details
     */
    public function setAdjustIncrementActivityDetails(
        ?GiftCardActivityAdjustIncrement $adjustIncrementActivityDetails
    ): void {
        $this->adjustIncrementActivityDetails = $adjustIncrementActivityDetails;
    }

    /**
     * Returns Adjust Decrement Activity Details.
     *
     * Describes a gift card activity of the ADJUST_DECREMENT type.
     */
    public function getAdjustDecrementActivityDetails(): ?GiftCardActivityAdjustDecrement
    {
        return $this->adjustDecrementActivityDetails;
    }

    /**
     * Sets Adjust Decrement Activity Details.
     *
     * Describes a gift card activity of the ADJUST_DECREMENT type.
     *
     * @maps adjust_decrement_activity_details
     */
    public function setAdjustDecrementActivityDetails(
        ?GiftCardActivityAdjustDecrement $adjustDecrementActivityDetails
    ): void {
        $this->adjustDecrementActivityDetails = $adjustDecrementActivityDetails;
    }

    /**
     * Returns Refund Activity Details.
     *
     * Present only when `GiftCardActivityType` is REFUND.
     */
    public function getRefundActivityDetails(): ?GiftCardActivityRefund
    {
        return $this->refundActivityDetails;
    }

    /**
     * Sets Refund Activity Details.
     *
     * Present only when `GiftCardActivityType` is REFUND.
     *
     * @maps refund_activity_details
     */
    public function setRefundActivityDetails(?GiftCardActivityRefund $refundActivityDetails): void
    {
        $this->refundActivityDetails = $refundActivityDetails;
    }

    /**
     * Returns Unlinked Activity Refund Activity Details.
     *
     * Present only when `GiftCardActivityType` is UNLINKED_ACTIVITY_REFUND.
     */
    public function getUnlinkedActivityRefundActivityDetails(): ?GiftCardActivityUnlinkedActivityRefund
    {
        return $this->unlinkedActivityRefundActivityDetails;
    }

    /**
     * Sets Unlinked Activity Refund Activity Details.
     *
     * Present only when `GiftCardActivityType` is UNLINKED_ACTIVITY_REFUND.
     *
     * @maps unlinked_activity_refund_activity_details
     */
    public function setUnlinkedActivityRefundActivityDetails(
        ?GiftCardActivityUnlinkedActivityRefund $unlinkedActivityRefundActivityDetails
    ): void {
        $this->unlinkedActivityRefundActivityDetails = $unlinkedActivityRefundActivityDetails;
    }

    /**
     * Returns Import Activity Details.
     *
     * Describes a gift card activity of the IMPORT type and the `GiftCardGANSource` is OTHER
     * (a third-party gift card).
     */
    public function getImportActivityDetails(): ?GiftCardActivityImport
    {
        return $this->importActivityDetails;
    }

    /**
     * Sets Import Activity Details.
     *
     * Describes a gift card activity of the IMPORT type and the `GiftCardGANSource` is OTHER
     * (a third-party gift card).
     *
     * @maps import_activity_details
     */
    public function setImportActivityDetails(?GiftCardActivityImport $importActivityDetails): void
    {
        $this->importActivityDetails = $importActivityDetails;
    }

    /**
     * Returns Block Activity Details.
     *
     * Describes a gift card activity of the BLOCK type.
     */
    public function getBlockActivityDetails(): ?GiftCardActivityBlock
    {
        return $this->blockActivityDetails;
    }

    /**
     * Sets Block Activity Details.
     *
     * Describes a gift card activity of the BLOCK type.
     *
     * @maps block_activity_details
     */
    public function setBlockActivityDetails(?GiftCardActivityBlock $blockActivityDetails): void
    {
        $this->blockActivityDetails = $blockActivityDetails;
    }

    /**
     * Returns Unblock Activity Details.
     *
     * Present only when `GiftCardActivityType` is UNBLOCK.
     */
    public function getUnblockActivityDetails(): ?GiftCardActivityUnblock
    {
        return $this->unblockActivityDetails;
    }

    /**
     * Sets Unblock Activity Details.
     *
     * Present only when `GiftCardActivityType` is UNBLOCK.
     *
     * @maps unblock_activity_details
     */
    public function setUnblockActivityDetails(?GiftCardActivityUnblock $unblockActivityDetails): void
    {
        $this->unblockActivityDetails = $unblockActivityDetails;
    }

    /**
     * Returns Import Reversal Activity Details.
     *
     * Present only when GiftCardActivityType is IMPORT_REVERSAL and GiftCardGANSource is OTHER
     */
    public function getImportReversalActivityDetails(): ?GiftCardActivityImportReversal
    {
        return $this->importReversalActivityDetails;
    }

    /**
     * Sets Import Reversal Activity Details.
     *
     * Present only when GiftCardActivityType is IMPORT_REVERSAL and GiftCardGANSource is OTHER
     *
     * @maps import_reversal_activity_details
     */
    public function setImportReversalActivityDetails(
        ?GiftCardActivityImportReversal $importReversalActivityDetails
    ): void {
        $this->importReversalActivityDetails = $importReversalActivityDetails;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                                        = $this->id;
        }
        $json['type']                                          = $this->type;
        $json['location_id']                                   = $this->locationId;
        if (isset($this->createdAt)) {
            $json['created_at']                                = $this->createdAt;
        }
        if (isset($this->giftCardId)) {
            $json['gift_card_id']                              = $this->giftCardId;
        }
        if (isset($this->giftCardGan)) {
            $json['gift_card_gan']                             = $this->giftCardGan;
        }
        if (isset($this->giftCardBalanceMoney)) {
            $json['gift_card_balance_money']                   = $this->giftCardBalanceMoney;
        }
        if (isset($this->loadActivityDetails)) {
            $json['load_activity_details']                     = $this->loadActivityDetails;
        }
        if (isset($this->activateActivityDetails)) {
            $json['activate_activity_details']                 = $this->activateActivityDetails;
        }
        if (isset($this->redeemActivityDetails)) {
            $json['redeem_activity_details']                   = $this->redeemActivityDetails;
        }
        if (isset($this->clearBalanceActivityDetails)) {
            $json['clear_balance_activity_details']            = $this->clearBalanceActivityDetails;
        }
        if (isset($this->deactivateActivityDetails)) {
            $json['deactivate_activity_details']               = $this->deactivateActivityDetails;
        }
        if (isset($this->adjustIncrementActivityDetails)) {
            $json['adjust_increment_activity_details']         = $this->adjustIncrementActivityDetails;
        }
        if (isset($this->adjustDecrementActivityDetails)) {
            $json['adjust_decrement_activity_details']         = $this->adjustDecrementActivityDetails;
        }
        if (isset($this->refundActivityDetails)) {
            $json['refund_activity_details']                   = $this->refundActivityDetails;
        }
        if (isset($this->unlinkedActivityRefundActivityDetails)) {
            $json['unlinked_activity_refund_activity_details'] = $this->unlinkedActivityRefundActivityDetails;
        }
        if (isset($this->importActivityDetails)) {
            $json['import_activity_details']                   = $this->importActivityDetails;
        }
        if (isset($this->blockActivityDetails)) {
            $json['block_activity_details']                    = $this->blockActivityDetails;
        }
        if (isset($this->unblockActivityDetails)) {
            $json['unblock_activity_details']                  = $this->unblockActivityDetails;
        }
        if (isset($this->importReversalActivityDetails)) {
            $json['import_reversal_activity_details']          = $this->importReversalActivityDetails;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
