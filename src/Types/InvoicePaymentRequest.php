<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a payment request for an [invoice](entity:Invoice). Invoices can specify a maximum
 * of 13 payment requests, with up to 12 `INSTALLMENT` request types. For more information,
 * see [Configuring payment requests](https://developer.squareup.com/docs/invoices-api/create-publish-invoices#payment-requests).
 *
 * Adding `INSTALLMENT` payment requests to an invoice requires an
 * [Invoices Plus subscription](https://developer.squareup.com/docs/invoices-api/overview#invoices-plus-subscription).
 */
class InvoicePaymentRequest extends JsonSerializableType
{
    /**
     * @var ?string $uid The Square-generated ID of the payment request in an [invoice](entity:Invoice).
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * Indicates how Square processes the payment request. DEPRECATED at version 2021-01-21. Replaced by the
     * `Invoice.delivery_method` and `InvoicePaymentRequest.automatic_payment_source` fields.
     *
     * One of the following is required when creating an invoice:
     * - (Recommended) The `delivery_method` field of the invoice. To configure an automatic payment, the
     * `automatic_payment_source` field of the payment request is also required.
     * - This `request_method` field. Note that `invoice` objects returned in responses do not include `request_method`.
     * See [InvoiceRequestMethod](#type-invoicerequestmethod) for possible values
     *
     * @var ?value-of<InvoiceRequestMethod> $requestMethod
     */
    #[JsonProperty('request_method')]
    private ?string $requestMethod;

    /**
     * Identifies the payment request type. This type defines how the payment request amount is determined.
     * This field is required to create a payment request.
     * See [InvoiceRequestType](#type-invoicerequesttype) for possible values
     *
     * @var ?value-of<InvoiceRequestType> $requestType
     */
    #[JsonProperty('request_type')]
    private ?string $requestType;

    /**
     * The due date (in the invoice's time zone) for the payment request, in `YYYY-MM-DD` format. This field
     * is required to create a payment request. If an `automatic_payment_source` is defined for the request, Square
     * charges the payment source on this date.
     *
     * After this date, the invoice becomes overdue. For example, a payment `due_date` of 2021-03-09 with a `timezone`
     * of America/Los\_Angeles becomes overdue at midnight on March 9 in America/Los\_Angeles (which equals a UTC
     * timestamp of 2021-03-10T08:00:00Z).
     *
     * @var ?string $dueDate
     */
    #[JsonProperty('due_date')]
    private ?string $dueDate;

    /**
     * If the payment request specifies `DEPOSIT` or `INSTALLMENT` as the `request_type`,
     * this indicates the request amount.
     * You cannot specify this when `request_type` is `BALANCE` or when the
     * payment request includes the `percentage_requested` field.
     *
     * @var ?Money $fixedAmountRequestedMoney
     */
    #[JsonProperty('fixed_amount_requested_money')]
    private ?Money $fixedAmountRequestedMoney;

    /**
     * Specifies the amount for the payment request in percentage:
     *
     * - When the payment `request_type` is `DEPOSIT`, it is the percentage of the order's total amount.
     * - When the payment `request_type` is `INSTALLMENT`, it is the percentage of the order's total less
     * the deposit, if requested. The sum of the `percentage_requested` in all installment
     * payment requests must be equal to 100.
     *
     * You cannot specify this when the payment `request_type` is `BALANCE` or when the
     * payment request specifies the `fixed_amount_requested_money` field.
     *
     * @var ?string $percentageRequested
     */
    #[JsonProperty('percentage_requested')]
    private ?string $percentageRequested;

    /**
     * If set to true, the Square-hosted invoice page (the `public_url` field of the invoice)
     * provides a place for the customer to pay a tip.
     *
     * This field is allowed only on the final payment request
     * and the payment `request_type` must be `BALANCE` or `INSTALLMENT`.
     *
     * @var ?bool $tippingEnabled
     */
    #[JsonProperty('tipping_enabled')]
    private ?bool $tippingEnabled;

    /**
     * The payment method for an automatic payment.
     *
     * The default value is `NONE`.
     * See [InvoiceAutomaticPaymentSource](#type-invoiceautomaticpaymentsource) for possible values
     *
     * @var ?value-of<InvoiceAutomaticPaymentSource> $automaticPaymentSource
     */
    #[JsonProperty('automatic_payment_source')]
    private ?string $automaticPaymentSource;

    /**
     * The ID of the credit or debit card on file to charge for the payment request. To get the cards on file for a customer,
     * call [ListCards](api-endpoint:Cards-ListCards) and include the `customer_id` of the invoice recipient.
     *
     * @var ?string $cardId
     */
    #[JsonProperty('card_id')]
    private ?string $cardId;

    /**
     * @var ?array<InvoicePaymentReminder> $reminders A list of one or more reminders to send for the payment request.
     */
    #[JsonProperty('reminders'), ArrayType([InvoicePaymentReminder::class])]
    private ?array $reminders;

    /**
     * The amount of the payment request, computed using the order amount and information from the various payment
     * request fields (`request_type`, `fixed_amount_requested_money`, and `percentage_requested`).
     *
     * @var ?Money $computedAmountMoney
     */
    #[JsonProperty('computed_amount_money')]
    private ?Money $computedAmountMoney;

    /**
     * The amount of money already paid for the specific payment request.
     * This amount might include a rounding adjustment if the most recent invoice payment
     * was in cash in a currency that rounds cash payments (such as, `CAD` or `AUD`).
     *
     * @var ?Money $totalCompletedAmountMoney
     */
    #[JsonProperty('total_completed_amount_money')]
    private ?Money $totalCompletedAmountMoney;

    /**
     * If the most recent payment was a cash payment
     * in a currency that rounds cash payments (such as, `CAD` or `AUD`) and the payment
     * is rounded from `computed_amount_money` in the payment request, then this
     * field specifies the rounding adjustment applied. This amount
     * might be negative.
     *
     * @var ?Money $roundingAdjustmentIncludedMoney
     */
    #[JsonProperty('rounding_adjustment_included_money')]
    private ?Money $roundingAdjustmentIncludedMoney;

    /**
     * @param array{
     *   uid?: ?string,
     *   requestMethod?: ?value-of<InvoiceRequestMethod>,
     *   requestType?: ?value-of<InvoiceRequestType>,
     *   dueDate?: ?string,
     *   fixedAmountRequestedMoney?: ?Money,
     *   percentageRequested?: ?string,
     *   tippingEnabled?: ?bool,
     *   automaticPaymentSource?: ?value-of<InvoiceAutomaticPaymentSource>,
     *   cardId?: ?string,
     *   reminders?: ?array<InvoicePaymentReminder>,
     *   computedAmountMoney?: ?Money,
     *   totalCompletedAmountMoney?: ?Money,
     *   roundingAdjustmentIncludedMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->requestMethod = $values['requestMethod'] ?? null;
        $this->requestType = $values['requestType'] ?? null;
        $this->dueDate = $values['dueDate'] ?? null;
        $this->fixedAmountRequestedMoney = $values['fixedAmountRequestedMoney'] ?? null;
        $this->percentageRequested = $values['percentageRequested'] ?? null;
        $this->tippingEnabled = $values['tippingEnabled'] ?? null;
        $this->automaticPaymentSource = $values['automaticPaymentSource'] ?? null;
        $this->cardId = $values['cardId'] ?? null;
        $this->reminders = $values['reminders'] ?? null;
        $this->computedAmountMoney = $values['computedAmountMoney'] ?? null;
        $this->totalCompletedAmountMoney = $values['totalCompletedAmountMoney'] ?? null;
        $this->roundingAdjustmentIncludedMoney = $values['roundingAdjustmentIncludedMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceRequestMethod>
     */
    public function getRequestMethod(): ?string
    {
        return $this->requestMethod;
    }

    /**
     * @param ?value-of<InvoiceRequestMethod> $value
     */
    public function setRequestMethod(?string $value = null): self
    {
        $this->requestMethod = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceRequestType>
     */
    public function getRequestType(): ?string
    {
        return $this->requestType;
    }

    /**
     * @param ?value-of<InvoiceRequestType> $value
     */
    public function setRequestType(?string $value = null): self
    {
        $this->requestType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * @param ?string $value
     */
    public function setDueDate(?string $value = null): self
    {
        $this->dueDate = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getFixedAmountRequestedMoney(): ?Money
    {
        return $this->fixedAmountRequestedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setFixedAmountRequestedMoney(?Money $value = null): self
    {
        $this->fixedAmountRequestedMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPercentageRequested(): ?string
    {
        return $this->percentageRequested;
    }

    /**
     * @param ?string $value
     */
    public function setPercentageRequested(?string $value = null): self
    {
        $this->percentageRequested = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getTippingEnabled(): ?bool
    {
        return $this->tippingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setTippingEnabled(?bool $value = null): self
    {
        $this->tippingEnabled = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceAutomaticPaymentSource>
     */
    public function getAutomaticPaymentSource(): ?string
    {
        return $this->automaticPaymentSource;
    }

    /**
     * @param ?value-of<InvoiceAutomaticPaymentSource> $value
     */
    public function setAutomaticPaymentSource(?string $value = null): self
    {
        $this->automaticPaymentSource = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * @param ?string $value
     */
    public function setCardId(?string $value = null): self
    {
        $this->cardId = $value;
        return $this;
    }

    /**
     * @return ?array<InvoicePaymentReminder>
     */
    public function getReminders(): ?array
    {
        return $this->reminders;
    }

    /**
     * @param ?array<InvoicePaymentReminder> $value
     */
    public function setReminders(?array $value = null): self
    {
        $this->reminders = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getComputedAmountMoney(): ?Money
    {
        return $this->computedAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setComputedAmountMoney(?Money $value = null): self
    {
        $this->computedAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTotalCompletedAmountMoney(): ?Money
    {
        return $this->totalCompletedAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTotalCompletedAmountMoney(?Money $value = null): self
    {
        $this->totalCompletedAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getRoundingAdjustmentIncludedMoney(): ?Money
    {
        return $this->roundingAdjustmentIncludedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setRoundingAdjustmentIncludedMoney(?Money $value = null): self
    {
        $this->roundingAdjustmentIncludedMoney = $value;
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
