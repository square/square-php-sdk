<?php

namespace Square\Checkout\PaymentLinks\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\PaymentLink;
use Square\Core\Json\JsonProperty;

class UpdatePaymentLinkRequest extends JsonSerializableType
{
    /**
     * @var string $id The ID of the payment link to update.
     */
    private string $id;

    /**
     * The `payment_link` object describing the updates to apply.
     * For more information, see [Update a payment link](https://developer.squareup.com/docs/checkout-api/manage-checkout#update-a-payment-link).
     *
     * @var PaymentLink $paymentLink
     */
    #[JsonProperty('payment_link')]
    private PaymentLink $paymentLink;

    /**
     * @param array{
     *   id: string,
     *   paymentLink: PaymentLink,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->paymentLink = $values['paymentLink'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return PaymentLink
     */
    public function getPaymentLink(): PaymentLink
    {
        return $this->paymentLink;
    }

    /**
     * @param PaymentLink $value
     */
    public function setPaymentLink(PaymentLink $value): self
    {
        $this->paymentLink = $value;
        return $this;
    }
}
