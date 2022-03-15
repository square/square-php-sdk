<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a gift card activity of the ACTIVATE type.
 */
class GiftCardActivityActivate implements \JsonSerializable
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
     * The ID of the order associated with the activity.
     * This is required if your application uses the Square Orders API.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the order associated with the activity.
     * This is required if your application uses the Square Orders API.
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
     * The `line_item_uid` of the gift card line item in an order.
     * This is required if your application uses the Square Orders API.
     */
    public function getLineItemUid(): ?string
    {
        return $this->lineItemUid;
    }

    /**
     * Sets Line Item Uid.
     *
     * The `line_item_uid` of the gift card line item in an order.
     * This is required if your application uses the Square Orders API.
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
     * If your application does not use the Square Orders API, you can optionally use this field
     * to associate the gift card activity with a client-side entity.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * If your application does not use the Square Orders API, you can optionally use this field
     * to associate the gift card activity with a client-side entity.
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
     * Required if your application does not use the Square Orders API.
     * This is a list of client-provided payment instrument IDs.
     * Square uses this information to perform compliance checks.
     * If you use the Square Orders API, Square has the necessary instrument IDs to perform necessary
     * compliance checks.
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
     * Required if your application does not use the Square Orders API.
     * This is a list of client-provided payment instrument IDs.
     * Square uses this information to perform compliance checks.
     * If you use the Square Orders API, Square has the necessary instrument IDs to perform necessary
     * compliance checks.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
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
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
