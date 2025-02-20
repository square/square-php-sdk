<?php

namespace Square\Checkout\PaymentLinks\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\QuickPay;
use Square\Types\Order;
use Square\Types\CheckoutOptions;
use Square\Types\PrePopulatedData;

class CreatePaymentLinkRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreatePaymentLinkRequest` request.
     * If you do not provide a unique string (or provide an empty string as the value),
     * the endpoint treats each request as independent.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * A description of the payment link. You provide this optional description that is useful in your
     * application context. It is not used anywhere.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * Describes an ad hoc item and price for which to generate a quick pay checkout link.
     * For more information,
     * see [Quick Pay Checkout](https://developer.squareup.com/docs/checkout-api/quick-pay-checkout).
     *
     * @var ?QuickPay $quickPay
     */
    #[JsonProperty('quick_pay')]
    private ?QuickPay $quickPay;

    /**
     * Describes the `Order` for which to create a checkout link.
     * For more information,
     * see [Square Order Checkout](https://developer.squareup.com/docs/checkout-api/square-order-checkout).
     *
     * @var ?Order $order
     */
    #[JsonProperty('order')]
    private ?Order $order;

    /**
     * Describes optional fields to add to the resulting checkout page.
     * For more information,
     * see [Optional Checkout Configurations](https://developer.squareup.com/docs/checkout-api/optional-checkout-configurations).
     *
     * @var ?CheckoutOptions $checkoutOptions
     */
    #[JsonProperty('checkout_options')]
    private ?CheckoutOptions $checkoutOptions;

    /**
     * Describes fields to prepopulate in the resulting checkout page.
     * For more information, see [Prepopulate the shipping address](https://developer.squareup.com/docs/checkout-api/optional-checkout-configurations#prepopulate-the-shipping-address).
     *
     * @var ?PrePopulatedData $prePopulatedData
     */
    #[JsonProperty('pre_populated_data')]
    private ?PrePopulatedData $prePopulatedData;

    /**
     * @var ?string $paymentNote A note for the payment. After processing the payment, Square adds this note to the resulting `Payment`.
     */
    #[JsonProperty('payment_note')]
    private ?string $paymentNote;

    /**
     * @param array{
     *   idempotencyKey?: ?string,
     *   description?: ?string,
     *   quickPay?: ?QuickPay,
     *   order?: ?Order,
     *   checkoutOptions?: ?CheckoutOptions,
     *   prePopulatedData?: ?PrePopulatedData,
     *   paymentNote?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->quickPay = $values['quickPay'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->checkoutOptions = $values['checkoutOptions'] ?? null;
        $this->prePopulatedData = $values['prePopulatedData'] ?? null;
        $this->paymentNote = $values['paymentNote'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        return $this;
    }

    /**
     * @return ?QuickPay
     */
    public function getQuickPay(): ?QuickPay
    {
        return $this->quickPay;
    }

    /**
     * @param ?QuickPay $value
     */
    public function setQuickPay(?QuickPay $value = null): self
    {
        $this->quickPay = $value;
        return $this;
    }

    /**
     * @return ?Order
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param ?Order $value
     */
    public function setOrder(?Order $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?CheckoutOptions
     */
    public function getCheckoutOptions(): ?CheckoutOptions
    {
        return $this->checkoutOptions;
    }

    /**
     * @param ?CheckoutOptions $value
     */
    public function setCheckoutOptions(?CheckoutOptions $value = null): self
    {
        $this->checkoutOptions = $value;
        return $this;
    }

    /**
     * @return ?PrePopulatedData
     */
    public function getPrePopulatedData(): ?PrePopulatedData
    {
        return $this->prePopulatedData;
    }

    /**
     * @param ?PrePopulatedData $value
     */
    public function setPrePopulatedData(?PrePopulatedData $value = null): self
    {
        $this->prePopulatedData = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentNote(): ?string
    {
        return $this->paymentNote;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentNote(?string $value = null): self
    {
        $this->paymentNote = $value;
        return $this;
    }
}
