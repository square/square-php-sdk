<?php

namespace Square\Locations\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CreateOrderRequest;
use Square\Types\Address;
use Square\Types\ChargeRequestAdditionalRecipient;
use Square\Core\Types\ArrayType;

class CreateCheckoutRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the business location to associate the checkout with.
     */
    private string $locationId;

    /**
     * A unique string that identifies this checkout among others you have created. It can be
     * any valid string but must be unique for every order sent to Square Checkout for a given location ID.
     *
     * The idempotency key is used to avoid processing the same order more than once. If you are
     * unsure whether a particular checkout was created successfully, you can attempt it again with
     * the same idempotency key and all the same other parameters without worrying about creating duplicates.
     *
     * You should use a random number/string generator native to the language
     * you are working in to generate strings for your idempotency keys.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var CreateOrderRequest $order The order including line items to be checked out.
     */
    #[JsonProperty('order')]
    private CreateOrderRequest $order;

    /**
     * If `true`, Square Checkout collects shipping information on your behalf and stores
     * that information with the transaction information in the Square Seller Dashboard.
     *
     * Default: `false`.
     *
     * @var ?bool $askForShippingAddress
     */
    #[JsonProperty('ask_for_shipping_address')]
    private ?bool $askForShippingAddress;

    /**
     * The email address to display on the Square Checkout confirmation page
     * and confirmation email that the buyer can use to contact the seller.
     *
     * If this value is not set, the confirmation page and email display the
     * primary email address associated with the seller's Square account.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?string $merchantSupportEmail
     */
    #[JsonProperty('merchant_support_email')]
    private ?string $merchantSupportEmail;

    /**
     * If provided, the buyer's email is prepopulated on the checkout page
     * as an editable text field.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?string $prePopulateBuyerEmail
     */
    #[JsonProperty('pre_populate_buyer_email')]
    private ?string $prePopulateBuyerEmail;

    /**
     * If provided, the buyer's shipping information is prepopulated on the
     * checkout page as editable text fields.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?Address $prePopulateShippingAddress
     */
    #[JsonProperty('pre_populate_shipping_address')]
    private ?Address $prePopulateShippingAddress;

    /**
     * The URL to redirect to after the checkout is completed with `checkoutId`,
     * `transactionId`, and `referenceId` appended as URL parameters. For example,
     * if the provided redirect URL is `http://www.example.com/order-complete`, a
     * successful transaction redirects the customer to:
     *
     * `http://www.example.com/order-complete?checkoutId=xxxxxx&amp;referenceId=xxxxxx&amp;transactionId=xxxxxx`
     *
     * If you do not provide a redirect URL, Square Checkout displays an order
     * confirmation page on your behalf; however, it is strongly recommended that
     * you provide a redirect URL so you can verify the transaction results and
     * finalize the order through your existing/normal confirmation workflow.
     *
     * Default: none; only exists if explicitly set.
     *
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    private ?string $redirectUrl;

    /**
     * The basic primitive of a multi-party transaction. The value is optional.
     * The transaction facilitated by you can be split from here.
     *
     * If you provide this value, the `amount_money` value in your `additional_recipients` field
     * cannot be more than 90% of the `total_money` calculated by Square for your order.
     * The `location_id` must be a valid seller location where the checkout is occurring.
     *
     * This field requires `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission.
     *
     * This field is currently not supported in the Square Sandbox.
     *
     * @var ?array<ChargeRequestAdditionalRecipient> $additionalRecipients
     */
    #[JsonProperty('additional_recipients'), ArrayType([ChargeRequestAdditionalRecipient::class])]
    private ?array $additionalRecipients;

    /**
     * An optional note to associate with the `checkout` object.
     *
     * This value cannot exceed 60 characters.
     *
     * @var ?string $note
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * @param array{
     *   locationId: string,
     *   idempotencyKey: string,
     *   order: CreateOrderRequest,
     *   askForShippingAddress?: ?bool,
     *   merchantSupportEmail?: ?string,
     *   prePopulateBuyerEmail?: ?string,
     *   prePopulateShippingAddress?: ?Address,
     *   redirectUrl?: ?string,
     *   additionalRecipients?: ?array<ChargeRequestAdditionalRecipient>,
     *   note?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->order = $values['order'];
        $this->askForShippingAddress = $values['askForShippingAddress'] ?? null;
        $this->merchantSupportEmail = $values['merchantSupportEmail'] ?? null;
        $this->prePopulateBuyerEmail = $values['prePopulateBuyerEmail'] ?? null;
        $this->prePopulateShippingAddress = $values['prePopulateShippingAddress'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->additionalRecipients = $values['additionalRecipients'] ?? null;
        $this->note = $values['note'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
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
     * @return CreateOrderRequest
     */
    public function getOrder(): CreateOrderRequest
    {
        return $this->order;
    }

    /**
     * @param CreateOrderRequest $value
     */
    public function setOrder(CreateOrderRequest $value): self
    {
        $this->order = $value;
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
     * @return ?array<ChargeRequestAdditionalRecipient>
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * @param ?array<ChargeRequestAdditionalRecipient> $value
     */
    public function setAdditionalRecipients(?array $value = null): self
    {
        $this->additionalRecipients = $value;
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
}
