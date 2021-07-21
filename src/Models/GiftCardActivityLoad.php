<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Present only when `GiftCardActivityType` is LOAD.
 */
class GiftCardActivityLoad implements \JsonSerializable
{
    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $lineItemUid;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string[]|null
     */
    private $buyerPaymentInstrumentIds;

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Order Id.
     *
     * The `order_id` of the order associated with the activity.
     * It is populated along with `line_item_uid` and is required if using the Square Orders API.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The `order_id` of the order associated with the activity.
     * It is populated along with `line_item_uid` and is required if using the Square Orders API.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Line Item Uid.
     *
     * The `line_item_uid` of the gift card’s line item in the order associated with the activity.
     * It is populated along with `order_id` and is required if using the Square Orders API.
     */
    public function getLineItemUid(): ?string
    {
        return $this->lineItemUid;
    }

    /**
     * Sets Line Item Uid.
     *
     * The `line_item_uid` of the gift card’s line item in the order associated with the activity.
     * It is populated along with `order_id` and is required if using the Square Orders API.
     *
     * @maps line_item_uid
     */
    public function setLineItemUid(?string $lineItemUid): void
    {
        $this->lineItemUid = $lineItemUid;
    }

    /**
     * Returns Reference Id.
     *
     * A client-specified ID to associate an entity, in another system, with this gift card
     * activity. This can be used to track the order or payment related information when the Square Orders
     * API is not being used.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * A client-specified ID to associate an entity, in another system, with this gift card
     * activity. This can be used to track the order or payment related information when the Square Orders
     * API is not being used.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Buyer Payment Instrument Ids.
     *
     * If you are not using the Orders API, this field is required because it is used to identify a buyer
     * to perform compliance checks.
     *
     * @return string[]|null
     */
    public function getBuyerPaymentInstrumentIds(): ?array
    {
        return $this->buyerPaymentInstrumentIds;
    }

    /**
     * Sets Buyer Payment Instrument Ids.
     *
     * If you are not using the Orders API, this field is required because it is used to identify a buyer
     * to perform compliance checks.
     *
     * @maps buyer_payment_instrument_ids
     *
     * @param string[]|null $buyerPaymentInstrumentIds
     */
    public function setBuyerPaymentInstrumentIds(?array $buyerPaymentInstrumentIds): void
    {
        $this->buyerPaymentInstrumentIds = $buyerPaymentInstrumentIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->amountMoney)) {
            $json['amount_money']                 = $this->amountMoney;
        }
        if (isset($this->orderId)) {
            $json['order_id']                     = $this->orderId;
        }
        if (isset($this->lineItemUid)) {
            $json['line_item_uid']                = $this->lineItemUid;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']                 = $this->referenceId;
        }
        if (isset($this->buyerPaymentInstrumentIds)) {
            $json['buyer_payment_instrument_ids'] = $this->buyerPaymentInstrumentIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
