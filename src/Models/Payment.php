<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a payment processed by the Square API.
 */
class Payment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

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
    private $totalMoney;

    /**
     * @var Money|null
     */
    private $appFeeMoney;

    /**
     * @var Money|null
     */
    private $approvedMoney;

    /**
     * @var ProcessingFee[]|null
     */
    private $processingFee;

    /**
     * @var Money|null
     */
    private $refundedMoney;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $delayDuration;

    /**
     * @var string|null
     */
    private $delayAction;

    /**
     * @var string|null
     */
    private $delayedUntil;

    /**
     * @var string|null
     */
    private $sourceType;

    /**
     * @var CardPaymentDetails|null
     */
    private $cardDetails;

    /**
     * @var CashPaymentDetails|null
     */
    private $cashDetails;

    /**
     * @var BankAccountPaymentDetails|null
     */
    private $bankAccountDetails;

    /**
     * @var ExternalPaymentDetails|null
     */
    private $externalDetails;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string[]|null
     */
    private $refundIds;

    /**
     * @var RiskEvaluation|null
     */
    private $riskEvaluation;

    /**
     * @var string|null
     */
    private $buyerEmailAddress;

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
     * @var string[]|null
     */
    private $capabilities;

    /**
     * @var string|null
     */
    private $receiptNumber;

    /**
     * @var string|null
     */
    private $receiptUrl;

    /**
     * @var string|null
     */
    private $versionToken;

    /**
     * Returns Id.
     *
     * A unique ID for the payment.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID for the payment.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Created At.
     *
     * The timestamp of when the payment was created, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp of when the payment was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp of when the payment was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp of when the payment was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
     * Returns Tip Money.
     *
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
     *
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
     * Returns Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalMoney(): ?Money
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_money
     */
    public function setTotalMoney(?Money $totalMoney): void
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns App Fee Money.
     *
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
     *
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
     * Returns Approved Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getApprovedMoney(): ?Money
    {
        return $this->approvedMoney;
    }

    /**
     * Sets Approved Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps approved_money
     */
    public function setApprovedMoney(?Money $approvedMoney): void
    {
        $this->approvedMoney = $approvedMoney;
    }

    /**
     * Returns Processing Fee.
     *
     * The processing fees and fee adjustments assessed by Square for this payment.
     *
     * @return ProcessingFee[]|null
     */
    public function getProcessingFee(): ?array
    {
        return $this->processingFee;
    }

    /**
     * Sets Processing Fee.
     *
     * The processing fees and fee adjustments assessed by Square for this payment.
     *
     * @maps processing_fee
     *
     * @param ProcessingFee[]|null $processingFee
     */
    public function setProcessingFee(?array $processingFee): void
    {
        $this->processingFee = $processingFee;
    }

    /**
     * Returns Refunded Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getRefundedMoney(): ?Money
    {
        return $this->refundedMoney;
    }

    /**
     * Sets Refunded Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps refunded_money
     */
    public function setRefundedMoney(?Money $refundedMoney): void
    {
        $this->refundedMoney = $refundedMoney;
    }

    /**
     * Returns Status.
     *
     * Indicates whether the payment is APPROVED, PENDING, COMPLETED, CANCELED, or FAILED.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates whether the payment is APPROVED, PENDING, COMPLETED, CANCELED, or FAILED.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Delay Duration.
     *
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
     */
    public function getDelayDuration(): ?string
    {
        return $this->delayDuration;
    }

    /**
     * Sets Delay Duration.
     *
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
     * @maps delay_duration
     */
    public function setDelayDuration(?string $delayDuration): void
    {
        $this->delayDuration = $delayDuration;
    }

    /**
     * Returns Delay Action.
     *
     * The action to be applied to the payment when the `delay_duration` has elapsed. This field
     * is read-only.
     *
     * Current values include `CANCEL`.
     */
    public function getDelayAction(): ?string
    {
        return $this->delayAction;
    }

    /**
     * Sets Delay Action.
     *
     * The action to be applied to the payment when the `delay_duration` has elapsed. This field
     * is read-only.
     *
     * Current values include `CANCEL`.
     *
     * @maps delay_action
     */
    public function setDelayAction(?string $delayAction): void
    {
        $this->delayAction = $delayAction;
    }

    /**
     * Returns Delayed Until.
     *
     * The read-only timestamp of when the `delay_action` is automatically applied,
     * in RFC 3339 format.
     *
     * Note that this field is calculated by summing the payment's `delay_duration` and `created_at`
     * fields. The `created_at` field is generated by Square and might not exactly match the
     * time on your local machine.
     */
    public function getDelayedUntil(): ?string
    {
        return $this->delayedUntil;
    }

    /**
     * Sets Delayed Until.
     *
     * The read-only timestamp of when the `delay_action` is automatically applied,
     * in RFC 3339 format.
     *
     * Note that this field is calculated by summing the payment's `delay_duration` and `created_at`
     * fields. The `created_at` field is generated by Square and might not exactly match the
     * time on your local machine.
     *
     * @maps delayed_until
     */
    public function setDelayedUntil(?string $delayedUntil): void
    {
        $this->delayedUntil = $delayedUntil;
    }

    /**
     * Returns Source Type.
     *
     * The source type for this payment.
     *
     * Current values include `CARD`, `BANK_ACCOUNT`, `CASH`, or `EXTERNAL`.
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * Sets Source Type.
     *
     * The source type for this payment.
     *
     * Current values include `CARD`, `BANK_ACCOUNT`, `CASH`, or `EXTERNAL`.
     *
     * @maps source_type
     */
    public function setSourceType(?string $sourceType): void
    {
        $this->sourceType = $sourceType;
    }

    /**
     * Returns Card Details.
     *
     * Reflects the current status of a card payment. Contains only non-confidential information.
     */
    public function getCardDetails(): ?CardPaymentDetails
    {
        return $this->cardDetails;
    }

    /**
     * Sets Card Details.
     *
     * Reflects the current status of a card payment. Contains only non-confidential information.
     *
     * @maps card_details
     */
    public function setCardDetails(?CardPaymentDetails $cardDetails): void
    {
        $this->cardDetails = $cardDetails;
    }

    /**
     * Returns Cash Details.
     *
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
     *
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
     * Returns Bank Account Details.
     *
     * Additional details about BANK_ACCOUNT type payments.
     */
    public function getBankAccountDetails(): ?BankAccountPaymentDetails
    {
        return $this->bankAccountDetails;
    }

    /**
     * Sets Bank Account Details.
     *
     * Additional details about BANK_ACCOUNT type payments.
     *
     * @maps bank_account_details
     */
    public function setBankAccountDetails(?BankAccountPaymentDetails $bankAccountDetails): void
    {
        $this->bankAccountDetails = $bankAccountDetails;
    }

    /**
     * Returns External Details.
     *
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
     *
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
     * Returns Location Id.
     *
     * The ID of the location associated with the payment.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location associated with the payment.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the order associated with the payment.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the order associated with the payment.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Reference Id.
     *
     * An optional ID that associates the payment with an entity in
     * another system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional ID that associates the payment with an entity in
     * another system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Customer Id.
     *
     * The [Customer]($m/Customer) ID of the customer associated with the payment.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The [Customer]($m/Customer) ID of the customer associated with the payment.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Employee Id.
     *
     * An optional ID of the employee associated with taking the payment.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * An optional ID of the employee associated with taking the payment.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Refund Ids.
     *
     * A list of `refund_id`s identifying refunds for the payment.
     *
     * @return string[]|null
     */
    public function getRefundIds(): ?array
    {
        return $this->refundIds;
    }

    /**
     * Sets Refund Ids.
     *
     * A list of `refund_id`s identifying refunds for the payment.
     *
     * @maps refund_ids
     *
     * @param string[]|null $refundIds
     */
    public function setRefundIds(?array $refundIds): void
    {
        $this->refundIds = $refundIds;
    }

    /**
     * Returns Risk Evaluation.
     *
     * Represents fraud risk information for the associated payment.
     *
     * When you take a payment through Square's Payments API (using the `CreatePayment`
     * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
     * can use this information to determine the course of action (for example,
     * provide the goods/services or refund the payment).
     */
    public function getRiskEvaluation(): ?RiskEvaluation
    {
        return $this->riskEvaluation;
    }

    /**
     * Sets Risk Evaluation.
     *
     * Represents fraud risk information for the associated payment.
     *
     * When you take a payment through Square's Payments API (using the `CreatePayment`
     * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
     * can use this information to determine the course of action (for example,
     * provide the goods/services or refund the payment).
     *
     * @maps risk_evaluation
     */
    public function setRiskEvaluation(?RiskEvaluation $riskEvaluation): void
    {
        $this->riskEvaluation = $riskEvaluation;
    }

    /**
     * Returns Buyer Email Address.
     *
     * The buyer's email address.
     */
    public function getBuyerEmailAddress(): ?string
    {
        return $this->buyerEmailAddress;
    }

    /**
     * Sets Buyer Email Address.
     *
     * The buyer's email address.
     *
     * @maps buyer_email_address
     */
    public function setBuyerEmailAddress(?string $buyerEmailAddress): void
    {
        $this->buyerEmailAddress = $buyerEmailAddress;
    }

    /**
     * Returns Billing Address.
     *
     * Represents a physical address.
     */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * Sets Billing Address.
     *
     * Represents a physical address.
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
     * Represents a physical address.
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps shipping_address
     */
    public function setShippingAddress(?Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Note.
     *
     * An optional note to include when creating a payment.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * An optional note to include when creating a payment.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Statement Description Identifier.
     *
     * Additional payment information that gets added to the customer's card statement
     * as part of the statement description.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and the name of the
     * seller taking the payment.
     */
    public function getStatementDescriptionIdentifier(): ?string
    {
        return $this->statementDescriptionIdentifier;
    }

    /**
     * Sets Statement Description Identifier.
     *
     * Additional payment information that gets added to the customer's card statement
     * as part of the statement description.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and the name of the
     * seller taking the payment.
     *
     * @maps statement_description_identifier
     */
    public function setStatementDescriptionIdentifier(?string $statementDescriptionIdentifier): void
    {
        $this->statementDescriptionIdentifier = $statementDescriptionIdentifier;
    }

    /**
     * Returns Capabilities.
     *
     * Actions that can be performed on this payment:
     * - `EDIT_AMOUNT_UP` - The payment amount can be edited up.
     * - `EDIT_AMOUNT_DOWN` - The payment amount can be edited down.
     * - `EDIT_TIP_AMOUNT_UP` - The tip amount can be edited up.
     * - `EDIT_TIP_AMOUNT_DOWN` - The tip amount can be edited down.
     *
     * @return string[]|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * Sets Capabilities.
     *
     * Actions that can be performed on this payment:
     * - `EDIT_AMOUNT_UP` - The payment amount can be edited up.
     * - `EDIT_AMOUNT_DOWN` - The payment amount can be edited down.
     * - `EDIT_TIP_AMOUNT_UP` - The tip amount can be edited up.
     * - `EDIT_TIP_AMOUNT_DOWN` - The tip amount can be edited down.
     *
     * @maps capabilities
     *
     * @param string[]|null $capabilities
     */
    public function setCapabilities(?array $capabilities): void
    {
        $this->capabilities = $capabilities;
    }

    /**
     * Returns Receipt Number.
     *
     * The payment's receipt number.
     * The field is missing if a payment is canceled.
     */
    public function getReceiptNumber(): ?string
    {
        return $this->receiptNumber;
    }

    /**
     * Sets Receipt Number.
     *
     * The payment's receipt number.
     * The field is missing if a payment is canceled.
     *
     * @maps receipt_number
     */
    public function setReceiptNumber(?string $receiptNumber): void
    {
        $this->receiptNumber = $receiptNumber;
    }

    /**
     * Returns Receipt Url.
     *
     * The URL for the payment's receipt.
     * The field is only populated for COMPLETED payments.
     */
    public function getReceiptUrl(): ?string
    {
        return $this->receiptUrl;
    }

    /**
     * Sets Receipt Url.
     *
     * The URL for the payment's receipt.
     * The field is only populated for COMPLETED payments.
     *
     * @maps receipt_url
     */
    public function setReceiptUrl(?string $receiptUrl): void
    {
        $this->receiptUrl = $receiptUrl;
    }

    /**
     * Returns Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies a specific version of the
     * `Payment` object.
     */
    public function getVersionToken(): ?string
    {
        return $this->versionToken;
    }

    /**
     * Sets Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies a specific version of the
     * `Payment` object.
     *
     * @maps version_token
     */
    public function setVersionToken(?string $versionToken): void
    {
        $this->versionToken = $versionToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                             = $this->id;
        $json['created_at']                     = $this->createdAt;
        $json['updated_at']                     = $this->updatedAt;
        $json['amount_money']                   = $this->amountMoney;
        $json['tip_money']                      = $this->tipMoney;
        $json['total_money']                    = $this->totalMoney;
        $json['app_fee_money']                  = $this->appFeeMoney;
        $json['approved_money']                 = $this->approvedMoney;
        $json['processing_fee']                 = $this->processingFee;
        $json['refunded_money']                 = $this->refundedMoney;
        $json['status']                         = $this->status;
        $json['delay_duration']                 = $this->delayDuration;
        $json['delay_action']                   = $this->delayAction;
        $json['delayed_until']                  = $this->delayedUntil;
        $json['source_type']                    = $this->sourceType;
        $json['card_details']                   = $this->cardDetails;
        $json['cash_details']                   = $this->cashDetails;
        $json['bank_account_details']           = $this->bankAccountDetails;
        $json['external_details']               = $this->externalDetails;
        $json['location_id']                    = $this->locationId;
        $json['order_id']                       = $this->orderId;
        $json['reference_id']                   = $this->referenceId;
        $json['customer_id']                    = $this->customerId;
        $json['employee_id']                    = $this->employeeId;
        $json['refund_ids']                     = $this->refundIds;
        $json['risk_evaluation']                = $this->riskEvaluation;
        $json['buyer_email_address']            = $this->buyerEmailAddress;
        $json['billing_address']                = $this->billingAddress;
        $json['shipping_address']               = $this->shippingAddress;
        $json['note']                           = $this->note;
        $json['statement_description_identifier'] = $this->statementDescriptionIdentifier;
        $json['capabilities']                   = $this->capabilities;
        $json['receipt_number']                 = $this->receiptNumber;
        $json['receipt_url']                    = $this->receiptUrl;
        $json['version_token']                  = $this->versionToken;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
