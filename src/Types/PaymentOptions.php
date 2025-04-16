<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentOptions extends JsonSerializableType
{
    /**
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are
     * automatically `COMPLETED` or left in an `APPROVED` state for later modification.
     *
     * Default: true
     *
     * @var ?bool $autocomplete
     */
    #[JsonProperty('autocomplete')]
    private ?bool $autocomplete;

    /**
     * The duration of time after the payment's creation when Square automatically resolves the
     * payment. This automatic resolution applies only to payments that do not reach a terminal state
     * (`COMPLETED` or `CANCELED`) before the `delay_duration` time period.
     *
     * This parameter should be specified as a time duration, in RFC 3339 format, with a minimum value
     * of 1 minute and a maximum value of 36 hours. This feature is only supported for card payments,
     * and all payments will be considered card-present.
     *
     * This parameter can only be set for a delayed capture payment (`autocomplete=false`). For more
     * information, see [Delayed Capture](https://developer.squareup.com/docs/payments-api/take-payments/card-payments/delayed-capture#time-threshold).
     *
     * Default: "PT36H" (36 hours) from the creation time
     *
     * @var ?string $delayDuration
     */
    #[JsonProperty('delay_duration')]
    private ?string $delayDuration;

    /**
     * If set to `true` and charging a Square Gift Card, a payment might be returned with
     * `amount_money` equal to less than what was requested. For example, a request for $20 when charging
     * a Square Gift Card with a balance of $5 results in an APPROVED payment of $5. You might choose
     * to prompt the buyer for an additional payment to cover the remainder or cancel the Gift Card
     * payment.
     *
     * This parameter can only be set for a delayed capture payment (`autocomplete=false`).
     *
     * For more information, see [Take Partial Payments](https://developer.squareup.com/docs/payments-api/take-payments/card-payments/partial-payments-with-gift-cards).
     *
     * Default: false
     *
     * @var ?bool $acceptPartialAuthorization
     */
    #[JsonProperty('accept_partial_authorization')]
    private ?bool $acceptPartialAuthorization;

    /**
     * The action to be applied to the `Payment` when the delay_duration has elapsed.
     * The action must be CANCEL or COMPLETE.
     *
     * The action cannot be set to COMPLETE if an `order_id` is present on the TerminalCheckout.
     *
     * This parameter can only be set for a delayed capture payment (`autocomplete=false`). For more
     * information, see [Delayed Capture](https://developer.squareup.com/docs/payments-api/take-payments/card-payments/delayed-capture#time-threshold).
     *
     * Default: CANCEL
     * See [DelayAction](#type-delayaction) for possible values
     *
     * @var ?value-of<PaymentOptionsDelayAction> $delayAction
     */
    #[JsonProperty('delay_action')]
    private ?string $delayAction;

    /**
     * @param array{
     *   autocomplete?: ?bool,
     *   delayDuration?: ?string,
     *   acceptPartialAuthorization?: ?bool,
     *   delayAction?: ?value-of<PaymentOptionsDelayAction>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->autocomplete = $values['autocomplete'] ?? null;
        $this->delayDuration = $values['delayDuration'] ?? null;
        $this->acceptPartialAuthorization = $values['acceptPartialAuthorization'] ?? null;
        $this->delayAction = $values['delayAction'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getAutocomplete(): ?bool
    {
        return $this->autocomplete;
    }

    /**
     * @param ?bool $value
     */
    public function setAutocomplete(?bool $value = null): self
    {
        $this->autocomplete = $value;
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
     * @return ?bool
     */
    public function getAcceptPartialAuthorization(): ?bool
    {
        return $this->acceptPartialAuthorization;
    }

    /**
     * @param ?bool $value
     */
    public function setAcceptPartialAuthorization(?bool $value = null): self
    {
        $this->acceptPartialAuthorization = $value;
        return $this;
    }

    /**
     * @return ?value-of<PaymentOptionsDelayAction>
     */
    public function getDelayAction(): ?string
    {
        return $this->delayAction;
    }

    /**
     * @param ?value-of<PaymentOptionsDelayAction> $value
     */
    public function setDelayAction(?string $value = null): self
    {
        $this->delayAction = $value;
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
