<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a payment processed by the Square API.
 */
class Payment extends JsonSerializableType
{
    /**
     * @var ?string $id A unique ID for the payment.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $createdAt The timestamp of when the payment was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp of when the payment was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * The amount processed for this payment, not including `tip_money`.
     *
     * The amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents). For more information, see
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * The amount designated as a tip.
     *
     * This amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents). For more information, see
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     *
     * @var ?Money $tipMoney
     */
    #[JsonProperty('tip_money')]
    private ?Money $tipMoney;

    /**
     * The total amount for the payment, including `amount_money` and `tip_money`.
     * This amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents). For more information, see
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     *
     * @var ?Money $totalMoney
     */
    #[JsonProperty('total_money')]
    private ?Money $totalMoney;

    /**
     * The amount the developer is taking as a fee for facilitating the payment on behalf
     * of the seller. This amount is specified in the smallest denomination of the applicable currency
     * (for example, US dollar amounts are specified in cents). For more information,
     * see [Take Payments and Collect Fees](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees).
     *
     * The amount cannot be more than 90% of the `total_money` value.
     *
     * To set this field, `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission is required.
     * For more information, see [Permissions](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees#permissions).
     *
     * @var ?Money $appFeeMoney
     */
    #[JsonProperty('app_fee_money')]
    private ?Money $appFeeMoney;

    /**
     * The amount of money approved for this payment. This value may change if Square chooses to
     * obtain reauthorization as part of a call to [UpdatePayment](api-endpoint:Payments-UpdatePayment).
     *
     * @var ?Money $approvedMoney
     */
    #[JsonProperty('approved_money')]
    private ?Money $approvedMoney;

    /**
     * @var ?array<ProcessingFee> $processingFee The processing fees and fee adjustments assessed by Square for this payment.
     */
    #[JsonProperty('processing_fee'), ArrayType([ProcessingFee::class])]
    private ?array $processingFee;

    /**
     * The total amount of the payment refunded to date.
     *
     * This amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents).
     *
     * @var ?Money $refundedMoney
     */
    #[JsonProperty('refunded_money')]
    private ?Money $refundedMoney;

    /**
     * @var ?string $status Indicates whether the payment is APPROVED, PENDING, COMPLETED, CANCELED, or FAILED.
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The duration of time after the payment's creation when Square automatically applies the
     * `delay_action` to the payment. This automatic `delay_action` applies only to payments that
     * do not reach a terminal state (COMPLETED, CANCELED, or FAILED) before the `delay_duration`
     * time period.
     *
     * This field is specified as a time duration, in RFC 3339 format.
     *
     * Notes:
     * This feature is only supported for card payments.
     *
     * Default:
     *
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     *
     * @var ?string $delayDuration
     */
    #[JsonProperty('delay_duration')]
    private ?string $delayDuration;

    /**
     * The action to be applied to the payment when the `delay_duration` has elapsed.
     *
     * Current values include `CANCEL` and `COMPLETE`.
     *
     * @var ?string $delayAction
     */
    #[JsonProperty('delay_action')]
    private ?string $delayAction;

    /**
     * The read-only timestamp of when the `delay_action` is automatically applied,
     * in RFC 3339 format.
     *
     * Note that this field is calculated by summing the payment's `delay_duration` and `created_at`
     * fields. The `created_at` field is generated by Square and might not exactly match the
     * time on your local machine.
     *
     * @var ?string $delayedUntil
     */
    #[JsonProperty('delayed_until')]
    private ?string $delayedUntil;

    /**
     * The source type for this payment.
     *
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `BUY_NOW_PAY_LATER`, `SQUARE_ACCOUNT`,
     * `CASH` and `EXTERNAL`. For information about these payment source types,
     * see [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     *
     * @var ?string $sourceType
     */
    #[JsonProperty('source_type')]
    private ?string $sourceType;

    /**
     * @var ?CardPaymentDetails $cardDetails Details about a card payment. These details are only populated if the source_type is `CARD`.
     */
    #[JsonProperty('card_details')]
    private ?CardPaymentDetails $cardDetails;

    /**
     * @var ?CashPaymentDetails $cashDetails Details about a cash payment. These details are only populated if the source_type is `CASH`.
     */
    #[JsonProperty('cash_details')]
    private ?CashPaymentDetails $cashDetails;

    /**
     * @var ?BankAccountPaymentDetails $bankAccountDetails Details about a bank account payment. These details are only populated if the source_type is `BANK_ACCOUNT`.
     */
    #[JsonProperty('bank_account_details')]
    private ?BankAccountPaymentDetails $bankAccountDetails;

    /**
     * Details about an external payment. The details are only populated
     * if the `source_type` is `EXTERNAL`.
     *
     * @var ?ExternalPaymentDetails $externalDetails
     */
    #[JsonProperty('external_details')]
    private ?ExternalPaymentDetails $externalDetails;

    /**
     * Details about an wallet payment. The details are only populated
     * if the `source_type` is `WALLET`.
     *
     * @var ?DigitalWalletDetails $walletDetails
     */
    #[JsonProperty('wallet_details')]
    private ?DigitalWalletDetails $walletDetails;

    /**
     * Details about a Buy Now Pay Later payment. The details are only populated
     * if the `source_type` is `BUY_NOW_PAY_LATER`. For more information, see
     * [Afterpay Payments](https://developer.squareup.com/docs/payments-api/take-payments/afterpay-payments).
     *
     * @var ?BuyNowPayLaterDetails $buyNowPayLaterDetails
     */
    #[JsonProperty('buy_now_pay_later_details')]
    private ?BuyNowPayLaterDetails $buyNowPayLaterDetails;

    /**
     * Details about a Square Account payment. The details are only populated
     * if the `source_type` is `SQUARE_ACCOUNT`.
     *
     * @var ?SquareAccountDetails $squareAccountDetails
     */
    #[JsonProperty('square_account_details')]
    private ?SquareAccountDetails $squareAccountDetails;

    /**
     * @var ?string $locationId The ID of the location associated with the payment.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $orderId The ID of the order associated with the payment.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * An optional ID that associates the payment with an entity in
     * another system.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * The ID of the customer associated with the payment. If the ID is
     * not provided in the `CreatePayment` request that was used to create the `Payment`,
     * Square may use information in the request
     * (such as the billing and shipping address, email address, and payment source)
     * to identify a matching customer profile in the Customer Directory.
     * If found, the profile ID is used. If a profile is not found, the
     * API attempts to create an
     * [instant profile](https://developer.squareup.com/docs/customers-api/what-it-does#instant-profiles).
     * If the API cannot create an
     * instant profile (either because the seller has disabled it or the
     * seller's region prevents creating it), this field remains unset. Note that
     * this process is asynchronous and it may take some time before a
     * customer ID is added to the payment.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * __Deprecated__: Use `Payment.team_member_id` instead.
     *
     * An optional ID of the employee associated with taking the payment.
     *
     * @var ?string $employeeId
     */
    #[JsonProperty('employee_id')]
    private ?string $employeeId;

    /**
     * @var ?string $teamMemberId An optional ID of the [TeamMember](entity:TeamMember) associated with taking the payment.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?array<string> $refundIds A list of `refund_id`s identifying refunds for the payment.
     */
    #[JsonProperty('refund_ids'), ArrayType(['string'])]
    private ?array $refundIds;

    /**
     * Provides information about the risk associated with the payment, as determined by Square.
     * This field is present for payments to sellers that have opted in to receive risk
     * evaluations.
     *
     * @var ?RiskEvaluation $riskEvaluation
     */
    #[JsonProperty('risk_evaluation')]
    private ?RiskEvaluation $riskEvaluation;

    /**
     * @var ?string $terminalCheckoutId An optional ID for a Terminal checkout that is associated with the payment.
     */
    #[JsonProperty('terminal_checkout_id')]
    private ?string $terminalCheckoutId;

    /**
     * @var ?string $buyerEmailAddress The buyer's email address.
     */
    #[JsonProperty('buyer_email_address')]
    private ?string $buyerEmailAddress;

    /**
     * @var ?Address $billingAddress The buyer's billing address.
     */
    #[JsonProperty('billing_address')]
    private ?Address $billingAddress;

    /**
     * @var ?Address $shippingAddress The buyer's shipping address.
     */
    #[JsonProperty('shipping_address')]
    private ?Address $shippingAddress;

    /**
     * @var ?string $note An optional note to include when creating a payment.
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * Additional payment information that gets added to the customer's card statement
     * as part of the statement description.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and the name of the
     * seller taking the payment.
     *
     * @var ?string $statementDescriptionIdentifier
     */
    #[JsonProperty('statement_description_identifier')]
    private ?string $statementDescriptionIdentifier;

    /**
     * Actions that can be performed on this payment:
     * - `EDIT_AMOUNT_UP` - The payment amount can be edited up.
     * - `EDIT_AMOUNT_DOWN` - The payment amount can be edited down.
     * - `EDIT_TIP_AMOUNT_UP` - The tip amount can be edited up.
     * - `EDIT_TIP_AMOUNT_DOWN` - The tip amount can be edited down.
     * - `EDIT_DELAY_ACTION` - The delay_action can be edited.
     *
     * @var ?array<string> $capabilities
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    private ?array $capabilities;

    /**
     * The payment's receipt number.
     * The field is missing if a payment is canceled.
     *
     * @var ?string $receiptNumber
     */
    #[JsonProperty('receipt_number')]
    private ?string $receiptNumber;

    /**
     * The URL for the payment's receipt.
     * The field is only populated for COMPLETED payments.
     *
     * @var ?string $receiptUrl
     */
    #[JsonProperty('receipt_url')]
    private ?string $receiptUrl;

    /**
     * @var ?DeviceDetails $deviceDetails Details about the device that took the payment.
     */
    #[JsonProperty('device_details')]
    private ?DeviceDetails $deviceDetails;

    /**
     * @var ?ApplicationDetails $applicationDetails Details about the application that took the payment.
     */
    #[JsonProperty('application_details')]
    private ?ApplicationDetails $applicationDetails;

    /**
     * @var ?bool $isOfflinePayment Whether or not this payment was taken offline.
     */
    #[JsonProperty('is_offline_payment')]
    private ?bool $isOfflinePayment;

    /**
     * @var ?OfflinePaymentDetails $offlinePaymentDetails Additional information about the payment if it was taken offline.
     */
    #[JsonProperty('offline_payment_details')]
    private ?OfflinePaymentDetails $offlinePaymentDetails;

    /**
     * Used for optimistic concurrency. This opaque token identifies a specific version of the
     * `Payment` object.
     *
     * @var ?string $versionToken
     */
    #[JsonProperty('version_token')]
    private ?string $versionToken;

    /**
     * @param array{
     *   id?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   amountMoney?: ?Money,
     *   tipMoney?: ?Money,
     *   totalMoney?: ?Money,
     *   appFeeMoney?: ?Money,
     *   approvedMoney?: ?Money,
     *   processingFee?: ?array<ProcessingFee>,
     *   refundedMoney?: ?Money,
     *   status?: ?string,
     *   delayDuration?: ?string,
     *   delayAction?: ?string,
     *   delayedUntil?: ?string,
     *   sourceType?: ?string,
     *   cardDetails?: ?CardPaymentDetails,
     *   cashDetails?: ?CashPaymentDetails,
     *   bankAccountDetails?: ?BankAccountPaymentDetails,
     *   externalDetails?: ?ExternalPaymentDetails,
     *   walletDetails?: ?DigitalWalletDetails,
     *   buyNowPayLaterDetails?: ?BuyNowPayLaterDetails,
     *   squareAccountDetails?: ?SquareAccountDetails,
     *   locationId?: ?string,
     *   orderId?: ?string,
     *   referenceId?: ?string,
     *   customerId?: ?string,
     *   employeeId?: ?string,
     *   teamMemberId?: ?string,
     *   refundIds?: ?array<string>,
     *   riskEvaluation?: ?RiskEvaluation,
     *   terminalCheckoutId?: ?string,
     *   buyerEmailAddress?: ?string,
     *   billingAddress?: ?Address,
     *   shippingAddress?: ?Address,
     *   note?: ?string,
     *   statementDescriptionIdentifier?: ?string,
     *   capabilities?: ?array<string>,
     *   receiptNumber?: ?string,
     *   receiptUrl?: ?string,
     *   deviceDetails?: ?DeviceDetails,
     *   applicationDetails?: ?ApplicationDetails,
     *   isOfflinePayment?: ?bool,
     *   offlinePaymentDetails?: ?OfflinePaymentDetails,
     *   versionToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->tipMoney = $values['tipMoney'] ?? null;
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->appFeeMoney = $values['appFeeMoney'] ?? null;
        $this->approvedMoney = $values['approvedMoney'] ?? null;
        $this->processingFee = $values['processingFee'] ?? null;
        $this->refundedMoney = $values['refundedMoney'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->delayDuration = $values['delayDuration'] ?? null;
        $this->delayAction = $values['delayAction'] ?? null;
        $this->delayedUntil = $values['delayedUntil'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->cardDetails = $values['cardDetails'] ?? null;
        $this->cashDetails = $values['cashDetails'] ?? null;
        $this->bankAccountDetails = $values['bankAccountDetails'] ?? null;
        $this->externalDetails = $values['externalDetails'] ?? null;
        $this->walletDetails = $values['walletDetails'] ?? null;
        $this->buyNowPayLaterDetails = $values['buyNowPayLaterDetails'] ?? null;
        $this->squareAccountDetails = $values['squareAccountDetails'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->employeeId = $values['employeeId'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->refundIds = $values['refundIds'] ?? null;
        $this->riskEvaluation = $values['riskEvaluation'] ?? null;
        $this->terminalCheckoutId = $values['terminalCheckoutId'] ?? null;
        $this->buyerEmailAddress = $values['buyerEmailAddress'] ?? null;
        $this->billingAddress = $values['billingAddress'] ?? null;
        $this->shippingAddress = $values['shippingAddress'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->statementDescriptionIdentifier = $values['statementDescriptionIdentifier'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->receiptNumber = $values['receiptNumber'] ?? null;
        $this->receiptUrl = $values['receiptUrl'] ?? null;
        $this->deviceDetails = $values['deviceDetails'] ?? null;
        $this->applicationDetails = $values['applicationDetails'] ?? null;
        $this->isOfflinePayment = $values['isOfflinePayment'] ?? null;
        $this->offlinePaymentDetails = $values['offlinePaymentDetails'] ?? null;
        $this->versionToken = $values['versionToken'] ?? null;
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
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
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
     * @return ?Money
     */
    public function getTipMoney(): ?Money
    {
        return $this->tipMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTipMoney(?Money $value = null): self
    {
        $this->tipMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalMoney(?Money $value = null): self
    {
        $this->totalMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAppFeeMoney(): ?Money
    {
        return $this->appFeeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAppFeeMoney(?Money $value = null): self
    {
        $this->appFeeMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getApprovedMoney(): ?Money
    {
        return $this->approvedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setApprovedMoney(?Money $value = null): self
    {
        $this->approvedMoney = $value;
        return $this;
    }

    /**
     * @return ?array<ProcessingFee>
     */
    public function getProcessingFee(): ?array
    {
        return $this->processingFee;
    }

    /**
     * @param ?array<ProcessingFee> $value
     */
    public function setProcessingFee(?array $value = null): self
    {
        $this->processingFee = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getRefundedMoney(): ?Money
    {
        return $this->refundedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setRefundedMoney(?Money $value = null): self
    {
        $this->refundedMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDelayDuration(): ?string
    {
        return $this->delayDuration;
    }

    /**
     * @param ?string $value
     */
    public function setDelayDuration(?string $value = null): self
    {
        $this->delayDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDelayAction(): ?string
    {
        return $this->delayAction;
    }

    /**
     * @param ?string $value
     */
    public function setDelayAction(?string $value = null): self
    {
        $this->delayAction = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDelayedUntil(): ?string
    {
        return $this->delayedUntil;
    }

    /**
     * @param ?string $value
     */
    public function setDelayedUntil(?string $value = null): self
    {
        $this->delayedUntil = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param ?string $value
     */
    public function setSourceType(?string $value = null): self
    {
        $this->sourceType = $value;
        return $this;
    }

    /**
     * @return ?CardPaymentDetails
     */
    public function getCardDetails(): ?CardPaymentDetails
    {
        return $this->cardDetails;
    }

    /**
     * @param ?CardPaymentDetails $value
     */
    public function setCardDetails(?CardPaymentDetails $value = null): self
    {
        $this->cardDetails = $value;
        return $this;
    }

    /**
     * @return ?CashPaymentDetails
     */
    public function getCashDetails(): ?CashPaymentDetails
    {
        return $this->cashDetails;
    }

    /**
     * @param ?CashPaymentDetails $value
     */
    public function setCashDetails(?CashPaymentDetails $value = null): self
    {
        $this->cashDetails = $value;
        return $this;
    }

    /**
     * @return ?BankAccountPaymentDetails
     */
    public function getBankAccountDetails(): ?BankAccountPaymentDetails
    {
        return $this->bankAccountDetails;
    }

    /**
     * @param ?BankAccountPaymentDetails $value
     */
    public function setBankAccountDetails(?BankAccountPaymentDetails $value = null): self
    {
        $this->bankAccountDetails = $value;
        return $this;
    }

    /**
     * @return ?ExternalPaymentDetails
     */
    public function getExternalDetails(): ?ExternalPaymentDetails
    {
        return $this->externalDetails;
    }

    /**
     * @param ?ExternalPaymentDetails $value
     */
    public function setExternalDetails(?ExternalPaymentDetails $value = null): self
    {
        $this->externalDetails = $value;
        return $this;
    }

    /**
     * @return ?DigitalWalletDetails
     */
    public function getWalletDetails(): ?DigitalWalletDetails
    {
        return $this->walletDetails;
    }

    /**
     * @param ?DigitalWalletDetails $value
     */
    public function setWalletDetails(?DigitalWalletDetails $value = null): self
    {
        $this->walletDetails = $value;
        return $this;
    }

    /**
     * @return ?BuyNowPayLaterDetails
     */
    public function getBuyNowPayLaterDetails(): ?BuyNowPayLaterDetails
    {
        return $this->buyNowPayLaterDetails;
    }

    /**
     * @param ?BuyNowPayLaterDetails $value
     */
    public function setBuyNowPayLaterDetails(?BuyNowPayLaterDetails $value = null): self
    {
        $this->buyNowPayLaterDetails = $value;
        return $this;
    }

    /**
     * @return ?SquareAccountDetails
     */
    public function getSquareAccountDetails(): ?SquareAccountDetails
    {
        return $this->squareAccountDetails;
    }

    /**
     * @param ?SquareAccountDetails $value
     */
    public function setSquareAccountDetails(?SquareAccountDetails $value = null): self
    {
        $this->squareAccountDetails = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * @param ?string $value
     */
    public function setEmployeeId(?string $value = null): self
    {
        $this->employeeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getRefundIds(): ?array
    {
        return $this->refundIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setRefundIds(?array $value = null): self
    {
        $this->refundIds = $value;
        return $this;
    }

    /**
     * @return ?RiskEvaluation
     */
    public function getRiskEvaluation(): ?RiskEvaluation
    {
        return $this->riskEvaluation;
    }

    /**
     * @param ?RiskEvaluation $value
     */
    public function setRiskEvaluation(?RiskEvaluation $value = null): self
    {
        $this->riskEvaluation = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTerminalCheckoutId(): ?string
    {
        return $this->terminalCheckoutId;
    }

    /**
     * @param ?string $value
     */
    public function setTerminalCheckoutId(?string $value = null): self
    {
        $this->terminalCheckoutId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBuyerEmailAddress(): ?string
    {
        return $this->buyerEmailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerEmailAddress(?string $value = null): self
    {
        $this->buyerEmailAddress = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * @param ?Address $value
     */
    public function setBillingAddress(?Address $value = null): self
    {
        $this->billingAddress = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * @param ?Address $value
     */
    public function setShippingAddress(?Address $value = null): self
    {
        $this->shippingAddress = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatementDescriptionIdentifier(): ?string
    {
        return $this->statementDescriptionIdentifier;
    }

    /**
     * @param ?string $value
     */
    public function setStatementDescriptionIdentifier(?string $value = null): self
    {
        $this->statementDescriptionIdentifier = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCapabilities(?array $value = null): self
    {
        $this->capabilities = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReceiptNumber(): ?string
    {
        return $this->receiptNumber;
    }

    /**
     * @param ?string $value
     */
    public function setReceiptNumber(?string $value = null): self
    {
        $this->receiptNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReceiptUrl(): ?string
    {
        return $this->receiptUrl;
    }

    /**
     * @param ?string $value
     */
    public function setReceiptUrl(?string $value = null): self
    {
        $this->receiptUrl = $value;
        return $this;
    }

    /**
     * @return ?DeviceDetails
     */
    public function getDeviceDetails(): ?DeviceDetails
    {
        return $this->deviceDetails;
    }

    /**
     * @param ?DeviceDetails $value
     */
    public function setDeviceDetails(?DeviceDetails $value = null): self
    {
        $this->deviceDetails = $value;
        return $this;
    }

    /**
     * @return ?ApplicationDetails
     */
    public function getApplicationDetails(): ?ApplicationDetails
    {
        return $this->applicationDetails;
    }

    /**
     * @param ?ApplicationDetails $value
     */
    public function setApplicationDetails(?ApplicationDetails $value = null): self
    {
        $this->applicationDetails = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsOfflinePayment(): ?bool
    {
        return $this->isOfflinePayment;
    }

    /**
     * @param ?bool $value
     */
    public function setIsOfflinePayment(?bool $value = null): self
    {
        $this->isOfflinePayment = $value;
        return $this;
    }

    /**
     * @return ?OfflinePaymentDetails
     */
    public function getOfflinePaymentDetails(): ?OfflinePaymentDetails
    {
        return $this->offlinePaymentDetails;
    }

    /**
     * @param ?OfflinePaymentDetails $value
     */
    public function setOfflinePaymentDetails(?OfflinePaymentDetails $value = null): self
    {
        $this->offlinePaymentDetails = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getVersionToken(): ?string
    {
        return $this->versionToken;
    }

    /**
     * @param ?string $value
     */
    public function setVersionToken(?string $value = null): self
    {
        $this->versionToken = $value;
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
