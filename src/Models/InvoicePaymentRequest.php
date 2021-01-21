<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a payment request for an [invoice](#type-Invoice). Invoices can specify a maximum
 * of 13 payment requests, with up to 12 `INSTALLMENT` request types.
 *
 * For more information,
 * see [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
 */
class InvoicePaymentRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $requestMethod;

    /**
     * @var string|null
     */
    private $requestType;

    /**
     * @var string|null
     */
    private $dueDate;

    /**
     * @var Money|null
     */
    private $fixedAmountRequestedMoney;

    /**
     * @var string|null
     */
    private $percentageRequested;

    /**
     * @var bool|null
     */
    private $tippingEnabled;

    /**
     * @var string|null
     */
    private $automaticPaymentSource;

    /**
     * @var string|null
     */
    private $cardId;

    /**
     * @var InvoicePaymentReminder[]|null
     */
    private $reminders;

    /**
     * @var Money|null
     */
    private $computedAmountMoney;

    /**
     * @var Money|null
     */
    private $totalCompletedAmountMoney;

    /**
     * @var Money|null
     */
    private $roundingAdjustmentIncludedMoney;

    /**
     * Returns Uid.
     *
     * The Square-generated ID of the payment request in an [invoice](#type-invoice).
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * The Square-generated ID of the payment request in an [invoice](#type-invoice).
     *
     * @maps uid
     */
    public function setUid(?string $uid): void
    {
        $this->uid = $uid;
    }

    /**
     * Returns Request Method.
     *
     * Specifies the action for Square to take for processing the invoice. For example,
     * email the invoice, charge a customer's card on file, or do nothing. DEPRECATED at version 2021-01-21.
     * The corresponding `request_method` field is replaced by the `Invoice.delivery_method` and
     * `InvoicePaymentRequest.automatic_payment_source` fields.
     */
    public function getRequestMethod(): ?string
    {
        return $this->requestMethod;
    }

    /**
     * Sets Request Method.
     *
     * Specifies the action for Square to take for processing the invoice. For example,
     * email the invoice, charge a customer's card on file, or do nothing. DEPRECATED at version 2021-01-21.
     * The corresponding `request_method` field is replaced by the `Invoice.delivery_method` and
     * `InvoicePaymentRequest.automatic_payment_source` fields.
     *
     * @maps request_method
     */
    public function setRequestMethod(?string $requestMethod): void
    {
        $this->requestMethod = $requestMethod;
    }

    /**
     * Returns Request Type.
     *
     * Indicates the type of the payment request. An invoice supports the following payment request
     * combinations:
     * - 1 balance
     * - 1 deposit with 1 balance
     * - 2 - 12 installments
     * - 1 deposit with 2 - 12 installments
     *
     * For more information,
     * see [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
     */
    public function getRequestType(): ?string
    {
        return $this->requestType;
    }

    /**
     * Sets Request Type.
     *
     * Indicates the type of the payment request. An invoice supports the following payment request
     * combinations:
     * - 1 balance
     * - 1 deposit with 1 balance
     * - 2 - 12 installments
     * - 1 deposit with 2 - 12 installments
     *
     * For more information,
     * see [Payment requests](https://developer.squareup.com/docs/invoices-api/overview#payment-requests).
     *
     * @maps request_type
     */
    public function setRequestType(?string $requestType): void
    {
        $this->requestType = $requestType;
    }

    /**
     * Returns Due Date.
     *
     * The due date (in the invoice location's time zone) for the payment request, in `YYYY-MM-DD` format.
     * After this date, the invoice becomes overdue. This field is required to create a payment request.
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * Sets Due Date.
     *
     * The due date (in the invoice location's time zone) for the payment request, in `YYYY-MM-DD` format.
     * After this date, the invoice becomes overdue. This field is required to create a payment request.
     *
     * @maps due_date
     */
    public function setDueDate(?string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * Returns Fixed Amount Requested Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getFixedAmountRequestedMoney(): ?Money
    {
        return $this->fixedAmountRequestedMoney;
    }

    /**
     * Sets Fixed Amount Requested Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps fixed_amount_requested_money
     */
    public function setFixedAmountRequestedMoney(?Money $fixedAmountRequestedMoney): void
    {
        $this->fixedAmountRequestedMoney = $fixedAmountRequestedMoney;
    }

    /**
     * Returns Percentage Requested.
     *
     * Specifies the amount for the payment request in percentage:
     *
     * - When the payment `request_type` is `DEPOSIT`, it is the percentage of the order total amount.
     * - When the payment `request_type` is `INSTALLMENT`, it is the percentage of the order total less
     * the deposit, if requested. The sum of the `percentage_requested` in all installment
     * payment requests must be equal to 100.
     *
     * You cannot specify this when the payment `request_type` is `BALANCE` or when the
     * payment request specifies the `fixed_amount_requested_money` field.
     */
    public function getPercentageRequested(): ?string
    {
        return $this->percentageRequested;
    }

    /**
     * Sets Percentage Requested.
     *
     * Specifies the amount for the payment request in percentage:
     *
     * - When the payment `request_type` is `DEPOSIT`, it is the percentage of the order total amount.
     * - When the payment `request_type` is `INSTALLMENT`, it is the percentage of the order total less
     * the deposit, if requested. The sum of the `percentage_requested` in all installment
     * payment requests must be equal to 100.
     *
     * You cannot specify this when the payment `request_type` is `BALANCE` or when the
     * payment request specifies the `fixed_amount_requested_money` field.
     *
     * @maps percentage_requested
     */
    public function setPercentageRequested(?string $percentageRequested): void
    {
        $this->percentageRequested = $percentageRequested;
    }

    /**
     * Returns Tipping Enabled.
     *
     * If set to true, the Square-hosted invoice page (the `public_url` field of the invoice)
     * provides a place for the customer to pay a tip.
     *
     * This field is allowed only on the final payment request
     * and the payment `request_type` must be `BALANCE` or `INSTALLMENT`.
     */
    public function getTippingEnabled(): ?bool
    {
        return $this->tippingEnabled;
    }

    /**
     * Sets Tipping Enabled.
     *
     * If set to true, the Square-hosted invoice page (the `public_url` field of the invoice)
     * provides a place for the customer to pay a tip.
     *
     * This field is allowed only on the final payment request
     * and the payment `request_type` must be `BALANCE` or `INSTALLMENT`.
     *
     * @maps tipping_enabled
     */
    public function setTippingEnabled(?bool $tippingEnabled): void
    {
        $this->tippingEnabled = $tippingEnabled;
    }

    /**
     * Returns Automatic Payment Source.
     *
     * Indicates the automatic payment method for an [invoice payment request](#type-InvoicePaymentRequest).
     */
    public function getAutomaticPaymentSource(): ?string
    {
        return $this->automaticPaymentSource;
    }

    /**
     * Sets Automatic Payment Source.
     *
     * Indicates the automatic payment method for an [invoice payment request](#type-InvoicePaymentRequest).
     *
     * @maps automatic_payment_source
     */
    public function setAutomaticPaymentSource(?string $automaticPaymentSource): void
    {
        $this->automaticPaymentSource = $automaticPaymentSource;
    }

    /**
     * Returns Card Id.
     *
     * The ID of the card on file to charge for the payment request. To get the customer’s card on file,
     * use the `customer_id` of the invoice recipient to call [RetrieveCustomer](#endpoint-Customers-
     * RetrieveCustomer)
     * in the Customers API. Then, get the ID of the target card from the `cards` field in the response.
     */
    public function getCardId(): ?string
    {
        return $this->cardId;
    }

    /**
     * Sets Card Id.
     *
     * The ID of the card on file to charge for the payment request. To get the customer’s card on file,
     * use the `customer_id` of the invoice recipient to call [RetrieveCustomer](#endpoint-Customers-
     * RetrieveCustomer)
     * in the Customers API. Then, get the ID of the target card from the `cards` field in the response.
     *
     * @maps card_id
     */
    public function setCardId(?string $cardId): void
    {
        $this->cardId = $cardId;
    }

    /**
     * Returns Reminders.
     *
     * A list of one or more reminders to send for the payment request.
     *
     * @return InvoicePaymentReminder[]|null
     */
    public function getReminders(): ?array
    {
        return $this->reminders;
    }

    /**
     * Sets Reminders.
     *
     * A list of one or more reminders to send for the payment request.
     *
     * @maps reminders
     *
     * @param InvoicePaymentReminder[]|null $reminders
     */
    public function setReminders(?array $reminders): void
    {
        $this->reminders = $reminders;
    }

    /**
     * Returns Computed Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getComputedAmountMoney(): ?Money
    {
        return $this->computedAmountMoney;
    }

    /**
     * Sets Computed Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps computed_amount_money
     */
    public function setComputedAmountMoney(?Money $computedAmountMoney): void
    {
        $this->computedAmountMoney = $computedAmountMoney;
    }

    /**
     * Returns Total Completed Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalCompletedAmountMoney(): ?Money
    {
        return $this->totalCompletedAmountMoney;
    }

    /**
     * Sets Total Completed Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_completed_amount_money
     */
    public function setTotalCompletedAmountMoney(?Money $totalCompletedAmountMoney): void
    {
        $this->totalCompletedAmountMoney = $totalCompletedAmountMoney;
    }

    /**
     * Returns Rounding Adjustment Included Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getRoundingAdjustmentIncludedMoney(): ?Money
    {
        return $this->roundingAdjustmentIncludedMoney;
    }

    /**
     * Sets Rounding Adjustment Included Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps rounding_adjustment_included_money
     */
    public function setRoundingAdjustmentIncludedMoney(?Money $roundingAdjustmentIncludedMoney): void
    {
        $this->roundingAdjustmentIncludedMoney = $roundingAdjustmentIncludedMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['uid']                             = $this->uid;
        $json['request_method']                  = $this->requestMethod;
        $json['request_type']                    = $this->requestType;
        $json['due_date']                        = $this->dueDate;
        $json['fixed_amount_requested_money']    = $this->fixedAmountRequestedMoney;
        $json['percentage_requested']            = $this->percentageRequested;
        $json['tipping_enabled']                 = $this->tippingEnabled;
        $json['automatic_payment_source']        = $this->automaticPaymentSource;
        $json['card_id']                         = $this->cardId;
        $json['reminders']                       = $this->reminders;
        $json['computed_amount_money']           = $this->computedAmountMoney;
        $json['total_completed_amount_money']    = $this->totalCompletedAmountMoney;
        $json['rounding_adjustment_included_money'] = $this->roundingAdjustmentIncludedMoney;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
