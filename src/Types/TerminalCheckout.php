<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a checkout processed by the Square Terminal.
 */
class TerminalCheckout extends JsonSerializableType
{
    /**
     * @var ?string $id A unique ID for this `TerminalCheckout`.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var Money $amountMoney The amount of money (including the tax amount) that the Square Terminal device should try to collect.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * An optional user-defined reference ID that can be used to associate
     * this `TerminalCheckout` to another entity in an external system. For example, an order
     * ID generated by a third-party shopping cart. The ID is also associated with any payments
     * used to complete the checkout.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * An optional note to associate with the checkout, as well as with any payments used to complete the checkout.
     * Note: maximum 500 characters
     *
     * @var ?string $note
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * @var ?string $orderId The reference to the Square order ID for the checkout request.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * @var ?PaymentOptions $paymentOptions Payment-specific options for the checkout request. Supported only in the US.
     */
    #[JsonProperty('payment_options')]
    private ?PaymentOptions $paymentOptions;

    /**
     * @var DeviceCheckoutOptions $deviceOptions Options to control the display and behavior of the Square Terminal device.
     */
    #[JsonProperty('device_options')]
    private DeviceCheckoutOptions $deviceOptions;

    /**
     * An RFC 3339 duration, after which the checkout is automatically canceled.
     * A `TerminalCheckout` that is `PENDING` is automatically `CANCELED` and has a cancellation reason
     * of `TIMED_OUT`.
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     *
     * @var ?string $deadlineDuration
     */
    #[JsonProperty('deadline_duration')]
    private ?string $deadlineDuration;

    /**
     * The status of the `TerminalCheckout`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, `COMPLETED`
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The reason why `TerminalCheckout` is canceled. Present if the status is `CANCELED`.
     * See [ActionCancelReason](#type-actioncancelreason) for possible values
     *
     * @var ?value-of<ActionCancelReason> $cancelReason
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * @var ?array<string> $paymentIds A list of IDs for payments created by this `TerminalCheckout`.
     */
    #[JsonProperty('payment_ids'), ArrayType(['string'])]
    private ?array $paymentIds;

    /**
     * @var ?string $createdAt The time when the `TerminalCheckout` was created, as an RFC 3339 timestamp.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The time when the `TerminalCheckout` was last updated, as an RFC 3339 timestamp.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $appId The ID of the application that created the checkout.
     */
    #[JsonProperty('app_id')]
    private ?string $appId;

    /**
     * @var ?string $locationId The location of the device where the `TerminalCheckout` was directed.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The type of payment the terminal should attempt to capture from. Defaults to `CARD_PRESENT`.
     * See [CheckoutOptionsPaymentType](#type-checkoutoptionspaymenttype) for possible values
     *
     * @var ?value-of<CheckoutOptionsPaymentType> $paymentType
     */
    #[JsonProperty('payment_type')]
    private ?string $paymentType;

    /**
     * @var ?string $teamMemberId An optional ID of the team member associated with creating the checkout.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?string $customerId An optional ID of the customer associated with the checkout.
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * The amount the developer is taking as a fee for facilitating the payment on behalf
     * of the seller.
     *
     * The amount cannot be more than 90% of the total amount of the payment.
     *
     * The amount must be specified in the smallest denomination of the applicable currency (for example, US dollar amounts are specified in cents). For more information, see [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts).
     *
     * The fee currency code must match the currency associated with the seller that is accepting the payment. The application must be from a developer account in the same country and using the same currency code as the seller.
     *
     * For more information about the application fee scenario, see [Take Payments and Collect Fees](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees).
     *
     * To set this field, PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS OAuth permission is required. For more information, see [Permissions](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees#permissions).
     *
     * Supported only in the US.
     *
     * @var ?Money $appFeeMoney
     */
    #[JsonProperty('app_fee_money')]
    private ?Money $appFeeMoney;

    /**
     * Optional additional payment information to include on the customer's card statement as
     * part of the statement description. This can be, for example, an invoice number, ticket number,
     * or short description that uniquely identifies the purchase. Supported only in the US.
     *
     * @var ?string $statementDescriptionIdentifier
     */
    #[JsonProperty('statement_description_identifier')]
    private ?string $statementDescriptionIdentifier;

    /**
     * The amount designated as a tip, in addition to `amount_money`. This may only be set for a
     * checkout that has tipping disabled (`tip_settings.allow_tipping` is `false`). Supported only in
     * the US.
     *
     * @var ?Money $tipMoney
     */
    #[JsonProperty('tip_money')]
    private ?Money $tipMoney;

    /**
     * @param array{
     *   amountMoney: Money,
     *   deviceOptions: DeviceCheckoutOptions,
     *   id?: ?string,
     *   referenceId?: ?string,
     *   note?: ?string,
     *   orderId?: ?string,
     *   paymentOptions?: ?PaymentOptions,
     *   deadlineDuration?: ?string,
     *   status?: ?string,
     *   cancelReason?: ?value-of<ActionCancelReason>,
     *   paymentIds?: ?array<string>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   appId?: ?string,
     *   locationId?: ?string,
     *   paymentType?: ?value-of<CheckoutOptionsPaymentType>,
     *   teamMemberId?: ?string,
     *   customerId?: ?string,
     *   appFeeMoney?: ?Money,
     *   statementDescriptionIdentifier?: ?string,
     *   tipMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->amountMoney = $values['amountMoney'];
        $this->referenceId = $values['referenceId'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->paymentOptions = $values['paymentOptions'] ?? null;
        $this->deviceOptions = $values['deviceOptions'];
        $this->deadlineDuration = $values['deadlineDuration'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->paymentIds = $values['paymentIds'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->appId = $values['appId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->paymentType = $values['paymentType'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->appFeeMoney = $values['appFeeMoney'] ?? null;
        $this->statementDescriptionIdentifier = $values['statementDescriptionIdentifier'] ?? null;
        $this->tipMoney = $values['tipMoney'] ?? null;
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
     * @return ?PaymentOptions
     */
    public function getPaymentOptions(): ?PaymentOptions
    {
        return $this->paymentOptions;
    }

    /**
     * @param ?PaymentOptions $value
     */
    public function setPaymentOptions(?PaymentOptions $value = null): self
    {
        $this->paymentOptions = $value;
        return $this;
    }

    /**
     * @return DeviceCheckoutOptions
     */
    public function getDeviceOptions(): DeviceCheckoutOptions
    {
        return $this->deviceOptions;
    }

    /**
     * @param DeviceCheckoutOptions $value
     */
    public function setDeviceOptions(DeviceCheckoutOptions $value): self
    {
        $this->deviceOptions = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeadlineDuration(): ?string
    {
        return $this->deadlineDuration;
    }

    /**
     * @param ?string $value
     */
    public function setDeadlineDuration(?string $value = null): self
    {
        $this->deadlineDuration = $value;
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
     * @return ?value-of<ActionCancelReason>
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * @param ?value-of<ActionCancelReason> $value
     */
    public function setCancelReason(?string $value = null): self
    {
        $this->cancelReason = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getPaymentIds(): ?array
    {
        return $this->paymentIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setPaymentIds(?array $value = null): self
    {
        $this->paymentIds = $value;
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
     * @return ?string
     */
    public function getAppId(): ?string
    {
        return $this->appId;
    }

    /**
     * @param ?string $value
     */
    public function setAppId(?string $value = null): self
    {
        $this->appId = $value;
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
     * @return ?value-of<CheckoutOptionsPaymentType>
     */
    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    /**
     * @param ?value-of<CheckoutOptionsPaymentType> $value
     */
    public function setPaymentType(?string $value = null): self
    {
        $this->paymentType = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
