<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CheckoutOptions extends JsonSerializableType
{
    /**
     * @var ?bool $allowTipping Indicates whether the payment allows tipping.
     */
    #[JsonProperty('allow_tipping')]
    private ?bool $allowTipping;

    /**
     * @var ?array<CustomField> $customFields The custom fields requesting information from the buyer.
     */
    #[JsonProperty('custom_fields'), ArrayType([CustomField::class])]
    private ?array $customFields;

    /**
     * The ID of the subscription plan for the buyer to pay and subscribe.
     * For more information, see [Subscription Plan Checkout](https://developer.squareup.com/docs/checkout-api/subscription-plan-checkout).
     *
     * @var ?string $subscriptionPlanId
     */
    #[JsonProperty('subscription_plan_id')]
    private ?string $subscriptionPlanId;

    /**
     * @var ?string $redirectUrl The confirmation page URL to redirect the buyer to after Square processes the payment.
     */
    #[JsonProperty('redirect_url')]
    private ?string $redirectUrl;

    /**
     * @var ?string $merchantSupportEmail The email address that buyers can use to contact the seller.
     */
    #[JsonProperty('merchant_support_email')]
    private ?string $merchantSupportEmail;

    /**
     * @var ?bool $askForShippingAddress Indicates whether to include the address fields in the payment form.
     */
    #[JsonProperty('ask_for_shipping_address')]
    private ?bool $askForShippingAddress;

    /**
     * @var ?AcceptedPaymentMethods $acceptedPaymentMethods The methods allowed for buyers during checkout.
     */
    #[JsonProperty('accepted_payment_methods')]
    private ?AcceptedPaymentMethods $acceptedPaymentMethods;

    /**
     * The amount of money that the developer is taking as a fee for facilitating the payment on behalf of the seller.
     *
     * The amount cannot be more than 90% of the total amount of the payment.
     *
     * The amount must be specified in the smallest denomination of the applicable currency (for example, US dollar amounts are specified in cents). For more information, see [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/common-data-types/working-with-monetary-amounts).
     *
     * The fee currency code must match the currency associated with the seller that is accepting the payment. The application must be from a developer account in the same country and using the same currency code as the seller. For more information about the application fee scenario, see [Take Payments and Collect Fees](https://developer.squareup.com/docs/payments-api/take-payments-and-collect-fees).
     *
     * To set this field, `PAYMENTS_WRITE_ADDITIONAL_RECIPIENTS` OAuth permission is required. For more information, see [Permissions](https://developer.squareup.com/docs/payments-api/collect-fees/additional-considerations#permissions).
     *
     * @var ?Money $appFeeMoney
     */
    #[JsonProperty('app_fee_money')]
    private ?Money $appFeeMoney;

    /**
     * @var ?ShippingFee $shippingFee The fee associated with shipping to be applied to the `Order` as a service charge.
     */
    #[JsonProperty('shipping_fee')]
    private ?ShippingFee $shippingFee;

    /**
     * @var ?bool $enableCoupon Indicates whether to include the `Add coupon` section for the buyer to provide a Square marketing coupon in the payment form.
     */
    #[JsonProperty('enable_coupon')]
    private ?bool $enableCoupon;

    /**
     * @var ?bool $enableLoyalty Indicates whether to include the `REWARDS` section for the buyer to opt in to loyalty, redeem rewards in the payment form, or both.
     */
    #[JsonProperty('enable_loyalty')]
    private ?bool $enableLoyalty;

    /**
     * @param array{
     *   allowTipping?: ?bool,
     *   customFields?: ?array<CustomField>,
     *   subscriptionPlanId?: ?string,
     *   redirectUrl?: ?string,
     *   merchantSupportEmail?: ?string,
     *   askForShippingAddress?: ?bool,
     *   acceptedPaymentMethods?: ?AcceptedPaymentMethods,
     *   appFeeMoney?: ?Money,
     *   shippingFee?: ?ShippingFee,
     *   enableCoupon?: ?bool,
     *   enableLoyalty?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allowTipping = $values['allowTipping'] ?? null;
        $this->customFields = $values['customFields'] ?? null;
        $this->subscriptionPlanId = $values['subscriptionPlanId'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->merchantSupportEmail = $values['merchantSupportEmail'] ?? null;
        $this->askForShippingAddress = $values['askForShippingAddress'] ?? null;
        $this->acceptedPaymentMethods = $values['acceptedPaymentMethods'] ?? null;
        $this->appFeeMoney = $values['appFeeMoney'] ?? null;
        $this->shippingFee = $values['shippingFee'] ?? null;
        $this->enableCoupon = $values['enableCoupon'] ?? null;
        $this->enableLoyalty = $values['enableLoyalty'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getAllowTipping(): ?bool
    {
        return $this->allowTipping;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowTipping(?bool $value = null): self
    {
        $this->allowTipping = $value;
        return $this;
    }

    /**
     * @return ?array<CustomField>
     */
    public function getCustomFields(): ?array
    {
        return $this->customFields;
    }

    /**
     * @param ?array<CustomField> $value
     */
    public function setCustomFields(?array $value = null): self
    {
        $this->customFields = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSubscriptionPlanId(): ?string
    {
        return $this->subscriptionPlanId;
    }

    /**
     * @param ?string $value
     */
    public function setSubscriptionPlanId(?string $value = null): self
    {
        $this->subscriptionPlanId = $value;
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
     * @return ?AcceptedPaymentMethods
     */
    public function getAcceptedPaymentMethods(): ?AcceptedPaymentMethods
    {
        return $this->acceptedPaymentMethods;
    }

    /**
     * @param ?AcceptedPaymentMethods $value
     */
    public function setAcceptedPaymentMethods(?AcceptedPaymentMethods $value = null): self
    {
        $this->acceptedPaymentMethods = $value;
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
     * @return ?ShippingFee
     */
    public function getShippingFee(): ?ShippingFee
    {
        return $this->shippingFee;
    }

    /**
     * @param ?ShippingFee $value
     */
    public function setShippingFee(?ShippingFee $value = null): self
    {
        $this->shippingFee = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnableCoupon(): ?bool
    {
        return $this->enableCoupon;
    }

    /**
     * @param ?bool $value
     */
    public function setEnableCoupon(?bool $value = null): self
    {
        $this->enableCoupon = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnableLoyalty(): ?bool
    {
        return $this->enableLoyalty;
    }

    /**
     * @param ?bool $value
     */
    public function setEnableLoyalty(?bool $value = null): self
    {
        $this->enableLoyalty = $value;
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
