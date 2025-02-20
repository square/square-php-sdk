<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentLink extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the payment link.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var int $version The Square-assigned version number, which is incremented each time an update is committed to the payment link.
     */
    #[JsonProperty('version')]
    private int $version;

    /**
     * The optional description of the `payment_link` object.
     * It is primarily for use by your application and is not used anywhere.
     *
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $orderId The ID of the order associated with the payment link.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The checkout options configured for the payment link.
     * For more information, see [Optional Checkout Configurations](https://developer.squareup.com/docs/checkout-api/optional-checkout-configurations).
     *
     * @var ?CheckoutOptions $checkoutOptions
     */
    #[JsonProperty('checkout_options')]
    private ?CheckoutOptions $checkoutOptions;

    /**
     * Describes buyer data to prepopulate
     * on the checkout page.
     *
     * @var ?PrePopulatedData $prePopulatedData
     */
    #[JsonProperty('pre_populated_data')]
    private ?PrePopulatedData $prePopulatedData;

    /**
     * @var ?string $url The shortened URL of the payment link.
     */
    #[JsonProperty('url')]
    private ?string $url;

    /**
     * @var ?string $longUrl The long URL of the payment link.
     */
    #[JsonProperty('long_url')]
    private ?string $longUrl;

    /**
     * @var ?string $createdAt The timestamp when the payment link was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the payment link was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * An optional note. After Square processes the payment, this note is added to the
     * resulting `Payment`.
     *
     * @var ?string $paymentNote
     */
    #[JsonProperty('payment_note')]
    private ?string $paymentNote;

    /**
     * @param array{
     *   version: int,
     *   id?: ?string,
     *   description?: ?string,
     *   orderId?: ?string,
     *   checkoutOptions?: ?CheckoutOptions,
     *   prePopulatedData?: ?PrePopulatedData,
     *   url?: ?string,
     *   longUrl?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   paymentNote?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->version = $values['version'];
        $this->description = $values['description'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
        $this->checkoutOptions = $values['checkoutOptions'] ?? null;
        $this->prePopulatedData = $values['prePopulatedData'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->longUrl = $values['longUrl'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->paymentNote = $values['paymentNote'] ?? null;
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
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $value
     */
    public function setVersion(int $value): self
    {
        $this->version = $value;
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
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param ?string $value
     */
    public function setUrl(?string $value = null): self
    {
        $this->url = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLongUrl(): ?string
    {
        return $this->longUrl;
    }

    /**
     * @param ?string $value
     */
    public function setLongUrl(?string $value = null): self
    {
        $this->longUrl = $value;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
