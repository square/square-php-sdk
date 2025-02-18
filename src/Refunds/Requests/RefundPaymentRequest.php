<?php

namespace Square\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Money;
use Square\Types\DestinationDetailsCashRefundDetails;
use Square\Types\DestinationDetailsExternalRefundDetails;

class RefundPaymentRequest extends JsonSerializableType
{
    /**
     *  A unique string that identifies this `RefundPayment` request. The key can be any valid string
     * but must be unique for every `RefundPayment` request.
     *
     * Keys are limited to a max of 45 characters - however, the number of allowed characters might be
     * less than 45, if multi-byte characters are used.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The amount of money to refund.
     *
     * This amount cannot be more than the `total_money` value of the payment minus the total
     * amount of all previously completed refunds for this payment.
     *
     * This amount must be specified in the smallest denomination of the applicable currency
     * (for example, US dollar amounts are specified in cents). For more information, see
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     *
     * The currency code must match the currency associated with the business
     * that is charging the card.
     *
     * @var Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * The amount of money the developer contributes to help cover the refunded amount.
     * This amount is specified in the smallest denomination of the applicable currency (for example,
     * US dollar amounts are specified in cents).
     *
     * The value cannot be more than the `amount_money`.
     *
     * You can specify this parameter in a refund request only if the same parameter was also included
     * when taking the payment. This is part of the application fee scenario the API supports. For more
     * information, see [Take Payments and Collect Fees](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees).
     *
     * To set this field, `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission is required.
     * For more information, see [Permissions](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees#permissions).
     *
     * @var ?Money $appFeeMoney
     */
    #[JsonProperty('app_fee_money')]
    private ?Money $appFeeMoney;

    /**
     * The unique ID of the payment being refunded.
     * Required when unlinked=false, otherwise must not be set.
     *
     * @var ?string $paymentId
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * The ID indicating where funds will be refunded to. Required for unlinked refunds. For more
     * information, see [Process an Unlinked Refund](https://developer.squareup.com/docs/refunds-api/unlinked-refunds).
     *
     * For refunds linked to Square payments, `destination_id` is usually omitted; in this case, funds
     * will be returned to the original payment source. The field may be specified in order to request
     * a cross-method refund to a gift card. For more information,
     * see [Cross-method refunds to gift cards](https://developer.squareup.com/docs/payments-api/refund-payments#cross-method-refunds-to-gift-cards).
     *
     * @var ?string $destinationId
     */
    #[JsonProperty('destination_id')]
    private ?string $destinationId;

    /**
     * Indicates that the refund is not linked to a Square payment.
     * If set to true, `destination_id` and `location_id` must be supplied while `payment_id` must not
     * be provided.
     *
     * @var ?bool $unlinked
     */
    #[JsonProperty('unlinked')]
    private ?bool $unlinked;

    /**
     * The location ID associated with the unlinked refund.
     * Required for requests specifying `unlinked=true`.
     * Otherwise, if included when `unlinked=false`, will throw an error.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The [Customer](entity:Customer) ID of the customer associated with the refund.
     * This is required if the `destination_id` refers to a card on file created using the Cards
     * API. Only allowed when `unlinked=true`.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @var ?string $reason A description of the reason for the refund.
     */
    #[JsonProperty('reason')]
    private ?string $reason;

    /**
     *  Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     * If the versions match, or the field is not provided, the refund proceeds as normal.
     *
     * @var ?string $paymentVersionToken
     */
    #[JsonProperty('payment_version_token')]
    private ?string $paymentVersionToken;

    /**
     * @var ?string $teamMemberId An optional [TeamMember](entity:TeamMember) ID to associate with this refund.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?DestinationDetailsCashRefundDetails $cashDetails Additional details required when recording an unlinked cash refund (`destination_id` is CASH).
     */
    #[JsonProperty('cash_details')]
    private ?DestinationDetailsCashRefundDetails $cashDetails;

    /**
     * Additional details required when recording an unlinked external refund
     * (`destination_id` is EXTERNAL).
     *
     * @var ?DestinationDetailsExternalRefundDetails $externalDetails
     */
    #[JsonProperty('external_details')]
    private ?DestinationDetailsExternalRefundDetails $externalDetails;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   amountMoney: Money,
     *   appFeeMoney?: ?Money,
     *   paymentId?: ?string,
     *   destinationId?: ?string,
     *   unlinked?: ?bool,
     *   locationId?: ?string,
     *   customerId?: ?string,
     *   reason?: ?string,
     *   paymentVersionToken?: ?string,
     *   teamMemberId?: ?string,
     *   cashDetails?: ?DestinationDetailsCashRefundDetails,
     *   externalDetails?: ?DestinationDetailsExternalRefundDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->amountMoney = $values['amountMoney'];
        $this->appFeeMoney = $values['appFeeMoney'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
        $this->destinationId = $values['destinationId'] ?? null;
        $this->unlinked = $values['unlinked'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->paymentVersionToken = $values['paymentVersionToken'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->cashDetails = $values['cashDetails'] ?? null;
        $this->externalDetails = $values['externalDetails'] ?? null;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
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
     * @return ?string
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentId(?string $value = null): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDestinationId(): ?string
    {
        return $this->destinationId;
    }

    /**
     * @param ?string $value
     */
    public function setDestinationId(?string $value = null): self
    {
        $this->destinationId = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getUnlinked(): ?bool
    {
        return $this->unlinked;
    }

    /**
     * @param ?bool $value
     */
    public function setUnlinked(?bool $value = null): self
    {
        $this->unlinked = $value;
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
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param ?string $value
     */
    public function setReason(?string $value = null): self
    {
        $this->reason = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentVersionToken(): ?string
    {
        return $this->paymentVersionToken;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentVersionToken(?string $value = null): self
    {
        $this->paymentVersionToken = $value;
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
     * @return ?DestinationDetailsCashRefundDetails
     */
    public function getCashDetails(): ?DestinationDetailsCashRefundDetails
    {
        return $this->cashDetails;
    }

    /**
     * @param ?DestinationDetailsCashRefundDetails $value
     */
    public function setCashDetails(?DestinationDetailsCashRefundDetails $value = null): self
    {
        $this->cashDetails = $value;
        return $this;
    }

    /**
     * @return ?DestinationDetailsExternalRefundDetails
     */
    public function getExternalDetails(): ?DestinationDetailsExternalRefundDetails
    {
        return $this->externalDetails;
    }

    /**
     * @param ?DestinationDetailsExternalRefundDetails $value
     */
    public function setExternalDetails(?DestinationDetailsExternalRefundDetails $value = null): self
    {
        $this->externalDetails = $value;
        return $this;
    }
}
