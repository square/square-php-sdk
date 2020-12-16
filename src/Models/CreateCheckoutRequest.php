<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the parameters that can be included in the body of
 * a request to the __CreateCheckout__ endpoint.
 */
class CreateCheckoutRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var CreateOrderRequest
     */
    private $order;

    /**
     * @var bool|null
     */
    private $askForShippingAddress;

    /**
     * @var string|null
     */
    private $merchantSupportEmail;

    /**
     * @var string|null
     */
    private $prePopulateBuyerEmail;

    /**
     * @var Address|null
     */
    private $prePopulateShippingAddress;

    /**
     * @var string|null
     */
    private $redirectUrl;

    /**
     * @var ChargeRequestAdditionalRecipient[]|null
     */
    private $additionalRecipients;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @param string $idempotencyKey
     * @param CreateOrderRequest $order
     */
    public function __construct(string $idempotencyKey, CreateOrderRequest $order)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->order = $order;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this checkout among others
     * you've created. It can be any valid string but must be unique for every
     * order sent to Square Checkout for a given location ID.
     *
     * The idempotency key is used to avoid processing the same order more than
     * once. If you're unsure whether a particular checkout was created
     * successfully, you can reattempt it with the same idempotency key and all the
     * same other parameters without worrying about creating duplicates.
     *
     * We recommend using a random number/string generator native to the language
     * you are working in to generate strings for your idempotency keys.
     *
     * See the [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) guide for
     * more information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this checkout among others
     * you've created. It can be any valid string but must be unique for every
     * order sent to Square Checkout for a given location ID.
     *
     * The idempotency key is used to avoid processing the same order more than
     * once. If you're unsure whether a particular checkout was created
     * successfully, you can reattempt it with the same idempotency key and all the
     * same other parameters without worrying about creating duplicates.
     *
     * We recommend using a random number/string generator native to the language
     * you are working in to generate strings for your idempotency keys.
     *
     * See the [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) guide for
     * more information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Order.
     */
    public function getOrder(): CreateOrderRequest
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * @required
     * @maps order
     */
    public function setOrder(CreateOrderRequest $order): void
    {
        $this->order = $order;
    }

    /**
     * Returns Ask for Shipping Address.
     *
     * If `true`, Square Checkout will collect shipping information on your
     * behalf and store that information with the transaction information in your
     * Square Dashboard.
     *
     * Default: `false`.
     */
    public function getAskForShippingAddress(): ?bool
    {
        return $this->askForShippingAddress;
    }

    /**
     * Sets Ask for Shipping Address.
     *
     * If `true`, Square Checkout will collect shipping information on your
     * behalf and store that information with the transaction information in your
     * Square Dashboard.
     *
     * Default: `false`.
     *
     * @maps ask_for_shipping_address
     */
    public function setAskForShippingAddress(?bool $askForShippingAddress): void
    {
        $this->askForShippingAddress = $askForShippingAddress;
    }

    /**
     * Returns Merchant Support Email.
     *
     * The email address to display on the Square Checkout confirmation page
     * and confirmation email that the buyer can use to contact the merchant.
     *
     * If this value is not set, the confirmation page and email will display the
     * primary email address associated with the merchant's Square account.
     *
     * Default: none; only exists if explicitly set.
     */
    public function getMerchantSupportEmail(): ?string
    {
        return $this->merchantSupportEmail;
    }

    /**
     * Sets Merchant Support Email.
     *
     * The email address to display on the Square Checkout confirmation page
     * and confirmation email that the buyer can use to contact the merchant.
     *
     * If this value is not set, the confirmation page and email will display the
     * primary email address associated with the merchant's Square account.
     *
     * Default: none; only exists if explicitly set.
     *
     * @maps merchant_support_email
     */
    public function setMerchantSupportEmail(?string $merchantSupportEmail): void
    {
        $this->merchantSupportEmail = $merchantSupportEmail;
    }

    /**
     * Returns Pre Populate Buyer Email.
     *
     * If provided, the buyer's email is pre-populated on the checkout page
     * as an editable text field.
     *
     * Default: none; only exists if explicitly set.
     */
    public function getPrePopulateBuyerEmail(): ?string
    {
        return $this->prePopulateBuyerEmail;
    }

    /**
     * Sets Pre Populate Buyer Email.
     *
     * If provided, the buyer's email is pre-populated on the checkout page
     * as an editable text field.
     *
     * Default: none; only exists if explicitly set.
     *
     * @maps pre_populate_buyer_email
     */
    public function setPrePopulateBuyerEmail(?string $prePopulateBuyerEmail): void
    {
        $this->prePopulateBuyerEmail = $prePopulateBuyerEmail;
    }

    /**
     * Returns Pre Populate Shipping Address.
     *
     * Represents a physical address.
     */
    public function getPrePopulateShippingAddress(): ?Address
    {
        return $this->prePopulateShippingAddress;
    }

    /**
     * Sets Pre Populate Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps pre_populate_shipping_address
     */
    public function setPrePopulateShippingAddress(?Address $prePopulateShippingAddress): void
    {
        $this->prePopulateShippingAddress = $prePopulateShippingAddress;
    }

    /**
     * Returns Redirect Url.
     *
     * The URL to redirect to after checkout is completed with `checkoutId`,
     * Square's `orderId`, `transactionId`, and `referenceId` appended as URL
     * parameters. For example, if the provided redirect_url is
     * `http://www.example.com/order-complete`, a successful transaction redirects
     * the customer to:
     *
     * <pre><code>http://www.example.com/order-complete?checkoutId=xxxxxx&amp;orderId=xxxxxx&amp;
     * referenceId=xxxxxx&amp;transactionId=xxxxxx</code></pre>
     *
     * If you do not provide a redirect URL, Square Checkout will display an order
     * confirmation page on your behalf; however Square strongly recommends that
     * you provide a redirect URL so you can verify the transaction results and
     * finalize the order through your existing/normal confirmation workflow.
     *
     * Default: none; only exists if explicitly set.
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    /**
     * Sets Redirect Url.
     *
     * The URL to redirect to after checkout is completed with `checkoutId`,
     * Square's `orderId`, `transactionId`, and `referenceId` appended as URL
     * parameters. For example, if the provided redirect_url is
     * `http://www.example.com/order-complete`, a successful transaction redirects
     * the customer to:
     *
     * <pre><code>http://www.example.com/order-complete?checkoutId=xxxxxx&amp;orderId=xxxxxx&amp;
     * referenceId=xxxxxx&amp;transactionId=xxxxxx</code></pre>
     *
     * If you do not provide a redirect URL, Square Checkout will display an order
     * confirmation page on your behalf; however Square strongly recommends that
     * you provide a redirect URL so you can verify the transaction results and
     * finalize the order through your existing/normal confirmation workflow.
     *
     * Default: none; only exists if explicitly set.
     *
     * @maps redirect_url
     */
    public function setRedirectUrl(?string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Returns Additional Recipients.
     *
     * The basic primitive of multi-party transaction. The value is optional.
     * The transaction facilitated by you can be split from here.
     *
     * If you provide this value, the `amount_money` value in your additional_recipients
     * must not be more than 90% of the `total_money` calculated by Square for your order.
     * The `location_id` must be the valid location of the app owner merchant.
     *
     * This field requires `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission.
     *
     * This field is currently not supported in sandbox.
     *
     * @return ChargeRequestAdditionalRecipient[]|null
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * Sets Additional Recipients.
     *
     * The basic primitive of multi-party transaction. The value is optional.
     * The transaction facilitated by you can be split from here.
     *
     * If you provide this value, the `amount_money` value in your additional_recipients
     * must not be more than 90% of the `total_money` calculated by Square for your order.
     * The `location_id` must be the valid location of the app owner merchant.
     *
     * This field requires `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission.
     *
     * This field is currently not supported in sandbox.
     *
     * @maps additional_recipients
     *
     * @param ChargeRequestAdditionalRecipient[]|null $additionalRecipients
     */
    public function setAdditionalRecipients(?array $additionalRecipients): void
    {
        $this->additionalRecipients = $additionalRecipients;
    }

    /**
     * Returns Note.
     *
     * An optional note to associate with the checkout object.
     *
     * This value cannot exceed 60 characters.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * An optional note to associate with the checkout object.
     *
     * This value cannot exceed 60 characters.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key']            = $this->idempotencyKey;
        $json['order']                      = $this->order;
        $json['ask_for_shipping_address']   = $this->askForShippingAddress;
        $json['merchant_support_email']     = $this->merchantSupportEmail;
        $json['pre_populate_buyer_email']   = $this->prePopulateBuyerEmail;
        $json['pre_populate_shipping_address'] = $this->prePopulateShippingAddress;
        $json['redirect_url']               = $this->redirectUrl;
        $json['additional_recipients']      = $this->additionalRecipients;
        $json['note']                       = $this->note;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
