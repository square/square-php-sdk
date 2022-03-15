<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Defines the parameters that can be included in the body of
 * a request to the [Charge]($e/Transactions/Charge) endpoint.
 *
 * Deprecated - recommend using [CreatePayment]($e/Payments/CreatePayment)
 */
class ChargeRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $cardNonce;

    /**
     * @var string|null
     */
    private $customerCardId;

    /**
     * @var bool|null
     */
    private $delayCapture;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var Address|null
     */
    private $billingAddress;

    /**
     * @var Address|null
     */
    private $shippingAddress;

    /**
     * @var string|null
     */
    private $buyerEmailAddress;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var ChargeRequestAdditionalRecipient[]|null
     */
    private $additionalRecipients;

    /**
     * @var string|null
     */
    private $verificationToken;

    /**
     * @param string $idempotencyKey
     * @param Money $amountMoney
     */
    public function __construct(string $idempotencyKey, Money $amountMoney)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * transaction among transactions you've created.
     *
     * If you're unsure whether a particular transaction succeeded,
     * you can reattempt it with the same idempotency key without
     * worrying about double-charging the buyer.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/working-with-apis/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A value you specify that uniquely identifies this
     * transaction among transactions you've created.
     *
     * If you're unsure whether a particular transaction succeeded,
     * you can reattempt it with the same idempotency key without
     * worrying about double-charging the buyer.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/working-with-apis/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

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
    public function getAmountMoney(): Money
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
     * @required
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Card Nonce.
     *
     * A payment token generated from the [Card.tokenize()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Card#Card.tokenize) that represents the card
     * to charge.
     *
     * The application that provides a payment token to this endpoint must be the
     * _same application_ that generated the payment token with the Web Payments SDK.
     * Otherwise, the nonce is invalid.
     *
     * Do not provide a value for this field if you provide a value for
     * `customer_card_id`.
     */
    public function getCardNonce(): ?string
    {
        return $this->cardNonce;
    }

    /**
     * Sets Card Nonce.
     *
     * A payment token generated from the [Card.tokenize()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Card#Card.tokenize) that represents the card
     * to charge.
     *
     * The application that provides a payment token to this endpoint must be the
     * _same application_ that generated the payment token with the Web Payments SDK.
     * Otherwise, the nonce is invalid.
     *
     * Do not provide a value for this field if you provide a value for
     * `customer_card_id`.
     *
     * @maps card_nonce
     */
    public function setCardNonce(?string $cardNonce): void
    {
        $this->cardNonce = $cardNonce;
    }

    /**
     * Returns Customer Card Id.
     *
     * The ID of the customer card on file to charge. Do
     * not provide a value for this field if you provide a value for `card_nonce`.
     *
     * If you provide this value, you _must_ also provide a value for
     * `customer_id`.
     */
    public function getCustomerCardId(): ?string
    {
        return $this->customerCardId;
    }

    /**
     * Sets Customer Card Id.
     *
     * The ID of the customer card on file to charge. Do
     * not provide a value for this field if you provide a value for `card_nonce`.
     *
     * If you provide this value, you _must_ also provide a value for
     * `customer_id`.
     *
     * @maps customer_card_id
     */
    public function setCustomerCardId(?string $customerCardId): void
    {
        $this->customerCardId = $customerCardId;
    }

    /**
     * Returns Delay Capture.
     *
     * If `true`, the request will only perform an Auth on the provided
     * card. You can then later perform either a Capture (with the
     * [CaptureTransaction]($e/Transactions/CaptureTransaction) endpoint) or a Void
     * (with the [VoidTransaction]($e/Transactions/VoidTransaction) endpoint).
     *
     * Default value: `false`
     */
    public function getDelayCapture(): ?bool
    {
        return $this->delayCapture;
    }

    /**
     * Sets Delay Capture.
     *
     * If `true`, the request will only perform an Auth on the provided
     * card. You can then later perform either a Capture (with the
     * [CaptureTransaction]($e/Transactions/CaptureTransaction) endpoint) or a Void
     * (with the [VoidTransaction]($e/Transactions/VoidTransaction) endpoint).
     *
     * Default value: `false`
     *
     * @maps delay_capture
     */
    public function setDelayCapture(?bool $delayCapture): void
    {
        $this->delayCapture = $delayCapture;
    }

    /**
     * Returns Reference Id.
     *
     * An optional ID you can associate with the transaction for your own
     * purposes (such as to associate the transaction with an entity ID in your
     * own database).
     *
     * This value cannot exceed 40 characters.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional ID you can associate with the transaction for your own
     * purposes (such as to associate the transaction with an entity ID in your
     * own database).
     *
     * This value cannot exceed 40 characters.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Note.
     *
     * An optional note to associate with the transaction.
     *
     * This value cannot exceed 60 characters.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * An optional note to associate with the transaction.
     *
     * This value cannot exceed 60 characters.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the customer to associate this transaction with. This field
     * is required if you provide a value for `customer_card_id`, and optional
     * otherwise.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the customer to associate this transaction with. This field
     * is required if you provide a value for `customer_card_id`, and optional
     * otherwise.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Billing Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * Sets Billing Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     *
     * @maps billing_address
     */
    public function setBillingAddress(?Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Returns Shipping Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     *
     * @maps shipping_address
     */
    public function setShippingAddress(?Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Buyer Email Address.
     *
     * The buyer's email address, if available. This value is optional,
     * but this transaction is ineligible for chargeback protection if it is not
     * provided.
     */
    public function getBuyerEmailAddress(): ?string
    {
        return $this->buyerEmailAddress;
    }

    /**
     * Sets Buyer Email Address.
     *
     * The buyer's email address, if available. This value is optional,
     * but this transaction is ineligible for chargeback protection if it is not
     * provided.
     *
     * @maps buyer_email_address
     */
    public function setBuyerEmailAddress(?string $buyerEmailAddress): void
    {
        $this->buyerEmailAddress = $buyerEmailAddress;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the order to associate with this transaction.
     *
     * If you provide this value, the `amount_money` value of your request must
     * __exactly match__ the value of the order's `total_money` field.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the order to associate with this transaction.
     *
     * If you provide this value, the `amount_money` value of your request must
     * __exactly match__ the value of the order's `total_money` field.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Additional Recipients.
     *
     * The basic primitive of multi-party transaction. The value is optional.
     * The transaction facilitated by you can be split from here.
     *
     * If you provide this value, the `amount_money` value in your additional_recipients
     * must not be more than 90% of the `amount_money` value in the charge request.
     * The `location_id` must be the valid location of the app owner merchant.
     *
     * This field requires the `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission.
     *
     * This field is currently not supported in sandbox.
     *
     * @return ChargeRequestAdditionalRecipient[]|null
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * Sets Additional Recipients.
     *
     * The basic primitive of multi-party transaction. The value is optional.
     * The transaction facilitated by you can be split from here.
     *
     * If you provide this value, the `amount_money` value in your additional_recipients
     * must not be more than 90% of the `amount_money` value in the charge request.
     * The `location_id` must be the valid location of the app owner merchant.
     *
     * This field requires the `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission.
     *
     * This field is currently not supported in sandbox.
     *
     * @maps additional_recipients
     *
     * @param ChargeRequestAdditionalRecipient[]|null $additionalRecipients
     */
    public function setAdditionalRecipients(?array $additionalRecipients): void
    {
        $this->additionalRecipients = $additionalRecipients;
    }

    /**
     * Returns Verification Token.
     *
     * A token generated by SqPaymentForm's verifyBuyer() that represents
     * customer's device info and 3ds challenge result.
     */
    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    /**
     * Sets Verification Token.
     *
     * A token generated by SqPaymentForm's verifyBuyer() that represents
     * customer's device info and 3ds challenge result.
     *
     * @maps verification_token
     */
    public function setVerificationToken(?string $verificationToken): void
    {
        $this->verificationToken = $verificationToken;
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
        $json['idempotency_key']           = $this->idempotencyKey;
        $json['amount_money']              = $this->amountMoney;
        if (isset($this->cardNonce)) {
            $json['card_nonce']            = $this->cardNonce;
        }
        if (isset($this->customerCardId)) {
            $json['customer_card_id']      = $this->customerCardId;
        }
        if (isset($this->delayCapture)) {
            $json['delay_capture']         = $this->delayCapture;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']          = $this->referenceId;
        }
        if (isset($this->note)) {
            $json['note']                  = $this->note;
        }
        if (isset($this->customerId)) {
            $json['customer_id']           = $this->customerId;
        }
        if (isset($this->billingAddress)) {
            $json['billing_address']       = $this->billingAddress;
        }
        if (isset($this->shippingAddress)) {
            $json['shipping_address']      = $this->shippingAddress;
        }
        if (isset($this->buyerEmailAddress)) {
            $json['buyer_email_address']   = $this->buyerEmailAddress;
        }
        if (isset($this->orderId)) {
            $json['order_id']              = $this->orderId;
        }
        if (isset($this->additionalRecipients)) {
            $json['additional_recipients'] = $this->additionalRecipients;
        }
        if (isset($this->verificationToken)) {
            $json['verification_token']    = $this->verificationToken;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
