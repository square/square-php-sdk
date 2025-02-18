<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents details about an `ACTIVATE` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityActivate extends JsonSerializableType
{
    /**
     * The amount added to the gift card. This value is a positive integer.
     *
     * Applications that use a custom order processing system must specify this amount in the
     * [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) request.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * The ID of the [order](entity:Order) that contains the `GIFT_CARD` line item.
     *
     * Applications that use the Square Orders API to process orders must specify the order ID
     * [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) request.
     *
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The UID of the `GIFT_CARD` line item in the order that represents the gift card purchase.
     *
     * Applications that use the Square Orders API to process orders must specify the line item UID
     * in the [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) request.
     *
     * @var ?string $lineItemUid
     */
    #[JsonProperty('line_item_uid')]
    private ?string $lineItemUid;

    /**
     * A client-specified ID that associates the gift card activity with an entity in another system.
     *
     * Applications that use a custom order processing system can use this field to track information
     * related to an order or payment.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * The payment instrument IDs used to process the gift card purchase, such as a credit card ID
     * or bank account ID.
     *
     * Applications that use a custom order processing system must specify payment instrument IDs in
     * the [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) request.
     * Square uses this information to perform compliance checks.
     *
     * For applications that use the Square Orders API to process payments, Square has the necessary
     * instrument IDs to perform compliance checks.
     *
     * Each buyer payment instrument ID can contain a maximum of 255 characters.
     *
     * @var ?array<string> $buyerPaymentInstrumentIds
     */
    #[JsonProperty('buyer_payment_instrument_ids'), ArrayType(['string'])]
    private ?array $buyerPaymentInstrumentIds;

    /**
     * @param array{
     *   amountMoney?: ?Money,
     *   orderId?: ?string,
     *   lineItemUid?: ?string,
     *   referenceId?: ?string,
     *   buyerPaymentInstrumentIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->lineItemUid = $values['lineItemUid'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->buyerPaymentInstrumentIds = $values['buyerPaymentInstrumentIds'] ?? null;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLineItemUid(): ?string
    {
        return $this->lineItemUid;
    }

    /**
     * @param ?string $value
     */
    public function setLineItemUid(?string $value = null): self
    {
        $this->lineItemUid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getBuyerPaymentInstrumentIds(): ?array
    {
        return $this->buyerPaymentInstrumentIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setBuyerPaymentInstrumentIds(?array $value = null): self
    {
        $this->buyerPaymentInstrumentIds = $value;
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
