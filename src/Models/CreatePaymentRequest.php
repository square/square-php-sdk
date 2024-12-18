<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a request to create a payment using
 * [CreatePayment]($e/Payments/CreatePayment).
 */
class CreatePaymentRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $sourceId;

    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $tipMoney;

    /**
     * @var Money|null
     */
    private $appFeeMoney;

    /**
     * @var string|null
     */
    private $delayDuration;

    /**
     * @var string|null
     */
    private $delayAction;

    /**
     * @var bool|null
     */
    private $autocomplete;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $verificationToken;

    /**
     * @var bool|null
     */
    private $acceptPartialAuthorization;

    /**
     * @var string|null
     */
    private $buyerEmailAddress;

    /**
     * @var string|null
     */
    private $buyerPhoneNumber;

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
    private $note;

    /**
     * @var string|null
     */
    private $statementDescriptionIdentifier;

    /**
     * @var CashPaymentDetails|null
     */
    private $cashDetails;

    /**
     * @var ExternalPaymentDetails|null
     */
    private $externalDetails;

    /**
     * @var CustomerDetails|null
     */
    private $customerDetails;

    /**
     * @var OfflinePaymentDetails|null
     */
    private $offlinePaymentDetails;

    /**
     * @param string $sourceId
     * @param string $idempotencyKey
     */
    public function __construct(string $sourceId, string $idempotencyKey)
    {
        $this->sourceId = $sourceId;
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Source Id.
     * The ID for the source of funds for this payment.
     * This could be a payment token generated by the Web Payments SDK for any of its
     * [supported methods](https://developer.squareup.com/docs/web-payments/overview#explore-payment-
     * methods),
     * including cards, bank transfers, Afterpay or Cash App Pay. If recording a payment
     * that the seller received outside of Square, specify either "CASH" or "EXTERNAL".
     * For more information, see
     * [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * Sets Source Id.
     * The ID for the source of funds for this payment.
     * This could be a payment token generated by the Web Payments SDK for any of its
     * [supported methods](https://developer.squareup.com/docs/web-payments/overview#explore-payment-
     * methods),
     * including cards, bank transfers, Afterpay or Cash App Pay. If recording a payment
     * that the seller received outside of Square, specify either "CASH" or "EXTERNAL".
     * For more information, see
     * [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     *
     * @required
     * @maps source_id
     */
    public function setSourceId(string $sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    /**
     * Returns Idempotency Key.
     * A unique string that identifies this `CreatePayment` request. Keys can be any valid string
     * but must be unique for every `CreatePayment` request.
     *
     * Note: The number of allowed characters might be less than the stated maximum, if multi-byte
     * characters are used.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     * A unique string that identifies this `CreatePayment` request. Keys can be any valid string
     * but must be unique for every `CreatePayment` request.
     *
     * Note: The number of allowed characters might be less than the stated maximum, if multi-byte
     * characters are used.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
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
     * Returns Tip Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTipMoney(): ?Money
    {
        return $this->tipMoney;
    }

    /**
     * Sets Tip Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps tip_money
     */
    public function setTipMoney(?Money $tipMoney): void
    {
        $this->tipMoney = $tipMoney;
    }

    /**
     * Returns App Fee Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppFeeMoney(): ?Money
    {
        return $this->appFeeMoney;
    }

    /**
     * Sets App Fee Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps app_fee_money
     */
    public function setAppFeeMoney(?Money $appFeeMoney): void
    {
        $this->appFeeMoney = $appFeeMoney;
    }

    /**
     * Returns Delay Duration.
     * The duration of time after the payment's creation when Square automatically
     * either completes or cancels the payment depending on the `delay_action` field value.
     * For more information, see
     * [Time threshold](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/delayed-capture#time-threshold).
     *
     * This parameter should be specified as a time duration, in RFC 3339 format.
     *
     * Note: This feature is only supported for card payments. This parameter can only be set for a
     * delayed
     * capture payment (`autocomplete=false`).
     *
     * Default:
     *
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     */
    public function getDelayDuration(): ?string
    {
        return $this->delayDuration;
    }

    /**
     * Sets Delay Duration.
     * The duration of time after the payment's creation when Square automatically
     * either completes or cancels the payment depending on the `delay_action` field value.
     * For more information, see
     * [Time threshold](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/delayed-capture#time-threshold).
     *
     * This parameter should be specified as a time duration, in RFC 3339 format.
     *
     * Note: This feature is only supported for card payments. This parameter can only be set for a
     * delayed
     * capture payment (`autocomplete=false`).
     *
     * Default:
     *
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     *
     * @maps delay_duration
     */
    public function setDelayDuration(?string $delayDuration): void
    {
        $this->delayDuration = $delayDuration;
    }

    /**
     * Returns Delay Action.
     * The action to be applied to the payment when the `delay_duration` has elapsed. The action must be
     * CANCEL or COMPLETE. For more information, see
     * [Time Threshold](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/delayed-capture#time-threshold).
     *
     * Default: CANCEL
     */
    public function getDelayAction(): ?string
    {
        return $this->delayAction;
    }

    /**
     * Sets Delay Action.
     * The action to be applied to the payment when the `delay_duration` has elapsed. The action must be
     * CANCEL or COMPLETE. For more information, see
     * [Time Threshold](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments/delayed-capture#time-threshold).
     *
     * Default: CANCEL
     *
     * @maps delay_action
     */
    public function setDelayAction(?string $delayAction): void
    {
        $this->delayAction = $delayAction;
    }

    /**
     * Returns Autocomplete.
     * If set to `true`, this payment will be completed when possible. If
     * set to `false`, this payment is held in an approved state until either
     * explicitly completed (captured) or canceled (voided). For more information, see
     * [Delayed capture](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments#delayed-capture-of-a-card-payment).
     *
     * Default: true
     */
    public function getAutocomplete(): ?bool
    {
        return $this->autocomplete;
    }

    /**
     * Sets Autocomplete.
     * If set to `true`, this payment will be completed when possible. If
     * set to `false`, this payment is held in an approved state until either
     * explicitly completed (captured) or canceled (voided). For more information, see
     * [Delayed capture](https://developer.squareup.com/docs/payments-api/take-payments/card-
     * payments#delayed-capture-of-a-card-payment).
     *
     * Default: true
     *
     * @maps autocomplete
     */
    public function setAutocomplete(?bool $autocomplete): void
    {
        $this->autocomplete = $autocomplete;
    }

    /**
     * Returns Order Id.
     * Associates a previously created order with this payment.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     * Associates a previously created order with this payment.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Customer Id.
     * The [Customer](entity:Customer) ID of the customer associated with the payment.
     *
     * This is required if the `source_id` refers to a card on file created using the Cards API.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     * The [Customer](entity:Customer) ID of the customer associated with the payment.
     *
     * This is required if the `source_id` refers to a card on file created using the Cards API.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Location Id.
     * The location ID to associate with the payment. If not specified, the [main location](https:
     * //developer.squareup.com/docs/locations-api#about-the-main-location) is
     * used.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     * The location ID to associate with the payment. If not specified, the [main location](https:
     * //developer.squareup.com/docs/locations-api#about-the-main-location) is
     * used.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Team Member Id.
     * An optional [TeamMember](entity:TeamMember) ID to associate with
     * this payment.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     * An optional [TeamMember](entity:TeamMember) ID to associate with
     * this payment.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Reference Id.
     * A user-defined ID to associate with the payment.
     *
     * You can use this field to associate the payment to an entity in an external system
     * (for example, you might specify an order ID that is generated by a third-party shopping cart).
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     * A user-defined ID to associate with the payment.
     *
     * You can use this field to associate the payment to an entity in an external system
     * (for example, you might specify an order ID that is generated by a third-party shopping cart).
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Verification Token.
     * An identifying token generated by [payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     *
     * For more information, see [SCA Overview](https://developer.squareup.com/docs/sca-overview).
     */
    public function getVerificationToken(): ?string
    {
        return $this->verificationToken;
    }

    /**
     * Sets Verification Token.
     * An identifying token generated by [payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     *
     * For more information, see [SCA Overview](https://developer.squareup.com/docs/sca-overview).
     *
     * @maps verification_token
     */
    public function setVerificationToken(?string $verificationToken): void
    {
        $this->verificationToken = $verificationToken;
    }

    /**
     * Returns Accept Partial Authorization.
     * If set to `true` and charging a Square Gift Card, a payment might be returned with
     * `amount_money` equal to less than what was requested. For example, a request for $20 when charging
     * a Square Gift Card with a balance of $5 results in an APPROVED payment of $5. You might choose
     * to prompt the buyer for an additional payment to cover the remainder or cancel the Gift Card
     * payment. This field cannot be `true` when `autocomplete = true`.
     *
     * For more information, see
     * [Partial amount with Square Gift Cards](https://developer.squareup.com/docs/payments-api/take-
     * payments#partial-payment-gift-card).
     *
     * Default: false
     */
    public function getAcceptPartialAuthorization(): ?bool
    {
        return $this->acceptPartialAuthorization;
    }

    /**
     * Sets Accept Partial Authorization.
     * If set to `true` and charging a Square Gift Card, a payment might be returned with
     * `amount_money` equal to less than what was requested. For example, a request for $20 when charging
     * a Square Gift Card with a balance of $5 results in an APPROVED payment of $5. You might choose
     * to prompt the buyer for an additional payment to cover the remainder or cancel the Gift Card
     * payment. This field cannot be `true` when `autocomplete = true`.
     *
     * For more information, see
     * [Partial amount with Square Gift Cards](https://developer.squareup.com/docs/payments-api/take-
     * payments#partial-payment-gift-card).
     *
     * Default: false
     *
     * @maps accept_partial_authorization
     */
    public function setAcceptPartialAuthorization(?bool $acceptPartialAuthorization): void
    {
        $this->acceptPartialAuthorization = $acceptPartialAuthorization;
    }

    /**
     * Returns Buyer Email Address.
     * The buyer's email address.
     */
    public function getBuyerEmailAddress(): ?string
    {
        return $this->buyerEmailAddress;
    }

    /**
     * Sets Buyer Email Address.
     * The buyer's email address.
     *
     * @maps buyer_email_address
     */
    public function setBuyerEmailAddress(?string $buyerEmailAddress): void
    {
        $this->buyerEmailAddress = $buyerEmailAddress;
    }

    /**
     * Returns Buyer Phone Number.
     * The buyer's phone number.
     * Must follow the following format:
     * 1. A leading + symbol (followed by a country code)
     * 2. The phone number can contain spaces and the special characters `(` , `)` , `-` , and `.`.
     * Alphabetical characters aren't allowed.
     * 3. The phone number must contain between 9 and 16 digits.
     */
    public function getBuyerPhoneNumber(): ?string
    {
        return $this->buyerPhoneNumber;
    }

    /**
     * Sets Buyer Phone Number.
     * The buyer's phone number.
     * Must follow the following format:
     * 1. A leading + symbol (followed by a country code)
     * 2. The phone number can contain spaces and the special characters `(` , `)` , `-` , and `.`.
     * Alphabetical characters aren't allowed.
     * 3. The phone number must contain between 9 and 16 digits.
     *
     * @maps buyer_phone_number
     */
    public function setBuyerPhoneNumber(?string $buyerPhoneNumber): void
    {
        $this->buyerPhoneNumber = $buyerPhoneNumber;
    }

    /**
     * Returns Billing Address.
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
     * Returns Note.
     * An optional note to be entered by the developer when creating a payment.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     * An optional note to be entered by the developer when creating a payment.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Statement Description Identifier.
     * Optional additional payment information to include on the customer's card statement
     * as part of the statement description. This can be, for example, an invoice number, ticket number,
     * or short description that uniquely identifies the purchase.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and name of the
     * seller taking the payment.
     */
    public function getStatementDescriptionIdentifier(): ?string
    {
        return $this->statementDescriptionIdentifier;
    }

    /**
     * Sets Statement Description Identifier.
     * Optional additional payment information to include on the customer's card statement
     * as part of the statement description. This can be, for example, an invoice number, ticket number,
     * or short description that uniquely identifies the purchase.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and name of the
     * seller taking the payment.
     *
     * @maps statement_description_identifier
     */
    public function setStatementDescriptionIdentifier(?string $statementDescriptionIdentifier): void
    {
        $this->statementDescriptionIdentifier = $statementDescriptionIdentifier;
    }

    /**
     * Returns Cash Details.
     * Stores details about a cash payment. Contains only non-confidential information. For more
     * information, see
     * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
     */
    public function getCashDetails(): ?CashPaymentDetails
    {
        return $this->cashDetails;
    }

    /**
     * Sets Cash Details.
     * Stores details about a cash payment. Contains only non-confidential information. For more
     * information, see
     * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
     *
     * @maps cash_details
     */
    public function setCashDetails(?CashPaymentDetails $cashDetails): void
    {
        $this->cashDetails = $cashDetails;
    }

    /**
     * Returns External Details.
     * Stores details about an external payment. Contains only non-confidential information.
     * For more information, see
     * [Take External Payments](https://developer.squareup.com/docs/payments-api/take-payments/external-
     * payments).
     */
    public function getExternalDetails(): ?ExternalPaymentDetails
    {
        return $this->externalDetails;
    }

    /**
     * Sets External Details.
     * Stores details about an external payment. Contains only non-confidential information.
     * For more information, see
     * [Take External Payments](https://developer.squareup.com/docs/payments-api/take-payments/external-
     * payments).
     *
     * @maps external_details
     */
    public function setExternalDetails(?ExternalPaymentDetails $externalDetails): void
    {
        $this->externalDetails = $externalDetails;
    }

    /**
     * Returns Customer Details.
     * Details about the customer making the payment.
     */
    public function getCustomerDetails(): ?CustomerDetails
    {
        return $this->customerDetails;
    }

    /**
     * Sets Customer Details.
     * Details about the customer making the payment.
     *
     * @maps customer_details
     */
    public function setCustomerDetails(?CustomerDetails $customerDetails): void
    {
        $this->customerDetails = $customerDetails;
    }

    /**
     * Returns Offline Payment Details.
     * Details specific to offline payments.
     */
    public function getOfflinePaymentDetails(): ?OfflinePaymentDetails
    {
        return $this->offlinePaymentDetails;
    }

    /**
     * Sets Offline Payment Details.
     * Details specific to offline payments.
     *
     * @maps offline_payment_details
     */
    public function setOfflinePaymentDetails(?OfflinePaymentDetails $offlinePaymentDetails): void
    {
        $this->offlinePaymentDetails = $offlinePaymentDetails;
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
        $json['source_id']                            = $this->sourceId;
        $json['idempotency_key']                      = $this->idempotencyKey;
        if (isset($this->amountMoney)) {
            $json['amount_money']                     = $this->amountMoney;
        }
        if (isset($this->tipMoney)) {
            $json['tip_money']                        = $this->tipMoney;
        }
        if (isset($this->appFeeMoney)) {
            $json['app_fee_money']                    = $this->appFeeMoney;
        }
        if (isset($this->delayDuration)) {
            $json['delay_duration']                   = $this->delayDuration;
        }
        if (isset($this->delayAction)) {
            $json['delay_action']                     = $this->delayAction;
        }
        if (isset($this->autocomplete)) {
            $json['autocomplete']                     = $this->autocomplete;
        }
        if (isset($this->orderId)) {
            $json['order_id']                         = $this->orderId;
        }
        if (isset($this->customerId)) {
            $json['customer_id']                      = $this->customerId;
        }
        if (isset($this->locationId)) {
            $json['location_id']                      = $this->locationId;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id']                   = $this->teamMemberId;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']                     = $this->referenceId;
        }
        if (isset($this->verificationToken)) {
            $json['verification_token']               = $this->verificationToken;
        }
        if (isset($this->acceptPartialAuthorization)) {
            $json['accept_partial_authorization']     = $this->acceptPartialAuthorization;
        }
        if (isset($this->buyerEmailAddress)) {
            $json['buyer_email_address']              = $this->buyerEmailAddress;
        }
        if (isset($this->buyerPhoneNumber)) {
            $json['buyer_phone_number']               = $this->buyerPhoneNumber;
        }
        if (isset($this->billingAddress)) {
            $json['billing_address']                  = $this->billingAddress;
        }
        if (isset($this->shippingAddress)) {
            $json['shipping_address']                 = $this->shippingAddress;
        }
        if (isset($this->note)) {
            $json['note']                             = $this->note;
        }
        if (isset($this->statementDescriptionIdentifier)) {
            $json['statement_description_identifier'] = $this->statementDescriptionIdentifier;
        }
        if (isset($this->cashDetails)) {
            $json['cash_details']                     = $this->cashDetails;
        }
        if (isset($this->externalDetails)) {
            $json['external_details']                 = $this->externalDetails;
        }
        if (isset($this->customerDetails)) {
            $json['customer_details']                 = $this->customerDetails;
        }
        if (isset($this->offlinePaymentDetails)) {
            $json['offline_payment_details']          = $this->offlinePaymentDetails;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
