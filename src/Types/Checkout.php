<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Square Checkout lets merchants accept online payments for supported
 * payment types using a checkout workflow hosted on squareup.com.
 */
class Checkout extends JsonSerializableType
{
    /**
     * @var ?string $id ID generated by Square Checkout when a new checkout is requested.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The URL that the buyer's browser should be redirected to after the
     * checkout is completed.
     *
     * @var ?string $checkoutPageUrl
     */
    #[JsonProperty('checkout_page_url')]
    private ?string $checkoutPageUrl;

    /**
     * If `true`, Square Checkout will collect shipping information on your
     * behalf and store that information with the transaction information in your
     * Square Dashboard.
     *
     * Default: `false`.
     *
     * @var ?bool $askForShippingAddress
     */
    #[JsonProperty('ask_for_shipping_address')]
    private ?bool $askForShippingAddress;

    /**
     * The email address to display on the Square Checkout confirmation page
     * and confirmation email that the buyer can use to contact the merchant.
     *
     * If this value is not set, the confirmation page and email will display the
     * primary email address associated with the merchant's Square account.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?string $merchantSupportEmail
     */
    #[JsonProperty('merchant_support_email')]
    private ?string $merchantSupportEmail;

    /**
     * If provided, the buyer's email is pre-populated on the checkout page
     * as an editable text field.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?string $prePopulateBuyerEmail
     */
    #[JsonProperty('pre_populate_buyer_email')]
    private ?string $prePopulateBuyerEmail;

    /**
     * If provided, the buyer's shipping info is pre-populated on the
     * checkout page as editable text fields.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?Address $prePopulateShippingAddress
     */
    #[JsonProperty('pre_populate_shipping_address')]
    private ?Address $prePopulateShippingAddress;

    /**
     * The URL to redirect to after checkout is completed with `checkoutId`,
     * Square's `orderId`, `transactionId`, and `referenceId` appended as URL
     * parameters. For example, if the provided redirect_url is
     * `http://www.example.com/order-complete`, a successful transaction redirects
     * the customer to:
     *
     * <pre><code>http://www.example.com/order-complete?checkoutId=xxxxxx&amp;orderId=xxxxxx&amp;referenceId=xxxxxx&amp;transactionId=xxxxxx</code></pre>
     *
     * If you do not provide a redirect URL, Square Checkout will display an order
     * confirmation page on your behalf; however Square strongly recommends that
     * you provide a redirect URL so you can verify the transaction results and
     * finalize the order through your existing/normal confirmation workflow.
     *
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    private ?string $redirectUrl;

    /**
     * @var ?Order $order Order to be checked out.
     */
    #[JsonProperty('order')]
    private ?Order $order;

    /**
     * @var ?string $createdAt The time when the checkout was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * Additional recipients (other than the merchant) receiving a portion of this checkout.
     * For example, fees assessed on the purchase by a third party integration.
     *
     * @var ?array<AdditionalRecipient> $additionalRecipients
     */
    #[JsonProperty('additional_recipients'), ArrayType([AdditionalRecipient::class])]
    private ?array $additionalRecipients;

    /**
     * @param array{
     *   id?: ?string,
     *   checkoutPageUrl?: ?string,
     *   askForShippingAddress?: ?bool,
     *   merchantSupportEmail?: ?string,
     *   prePopulateBuyerEmail?: ?string,
     *   prePopulateShippingAddress?: ?Address,
     *   redirectUrl?: ?string,
     *   order?: ?Order,
     *   createdAt?: ?string,
     *   additionalRecipients?: ?array<AdditionalRecipient>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->checkoutPageUrl = $values['checkoutPageUrl'] ?? null;
        $this->askForShippingAddress = $values['askForShippingAddress'] ?? null;
        $this->merchantSupportEmail = $values['merchantSupportEmail'] ?? null;
        $this->prePopulateBuyerEmail = $values['prePopulateBuyerEmail'] ?? null;
        $this->prePopulateShippingAddress = $values['prePopulateShippingAddress'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->additionalRecipients = $values['additionalRecipients'] ?? null;
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
    public function getCheckoutPageUrl(): ?string
    {
        return $this->checkoutPageUrl;
    }

    /**
     * @param ?string $value
     */
    public function setCheckoutPageUrl(?string $value = null): self
    {
        $this->checkoutPageUrl = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAskForShippingAddress(): ?bool
    {
        return $this->askForShippingAddress;
    }

    /**
     * @param ?bool $value
     */
    public function setAskForShippingAddress(?bool $value = null): self
    {
        $this->askForShippingAddress = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMerchantSupportEmail(): ?string
    {
        return $this->merchantSupportEmail;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantSupportEmail(?string $value = null): self
    {
        $this->merchantSupportEmail = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPrePopulateBuyerEmail(): ?string
    {
        return $this->prePopulateBuyerEmail;
    }

    /**
     * @param ?string $value
     */
    public function setPrePopulateBuyerEmail(?string $value = null): self
    {
        $this->prePopulateBuyerEmail = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getPrePopulateShippingAddress(): ?Address
    {
        return $this->prePopulateShippingAddress;
    }

    /**
     * @param ?Address $value
     */
    public function setPrePopulateShippingAddress(?Address $value = null): self
    {
        $this->prePopulateShippingAddress = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    /**
     * @param ?string $value
     */
    public function setRedirectUrl(?string $value = null): self
    {
        $this->redirectUrl = $value;
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
     * @return ?array<AdditionalRecipient>
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * @param ?array<AdditionalRecipient> $value
     */
    public function setAdditionalRecipients(?array $value = null): self
    {
        $this->additionalRecipients = $value;
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
