<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class CheckoutOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $allowTipping;

    /**
     * @var CustomField[]|null
     */
    private $customFields;

    /**
     * @var string|null
     */
    private $subscriptionPlanId;

    /**
     * @var string|null
     */
    private $redirectUrl;

    /**
     * @var string|null
     */
    private $merchantSupportEmail;

    /**
     * @var bool|null
     */
    private $askForShippingAddress;

    /**
     * @var AcceptedPaymentMethods|null
     */
    private $acceptedPaymentMethods;

    /**
     * Returns Allow Tipping.
     * Indicates whether the payment allows tipping.
     */
    public function getAllowTipping(): ?bool
    {
        return $this->allowTipping;
    }

    /**
     * Sets Allow Tipping.
     * Indicates whether the payment allows tipping.
     *
     * @maps allow_tipping
     */
    public function setAllowTipping(?bool $allowTipping): void
    {
        $this->allowTipping = $allowTipping;
    }

    /**
     * Returns Custom Fields.
     * The custom fields requesting information from the buyer.
     *
     * @return CustomField[]|null
     */
    public function getCustomFields(): ?array
    {
        return $this->customFields;
    }

    /**
     * Sets Custom Fields.
     * The custom fields requesting information from the buyer.
     *
     * @maps custom_fields
     *
     * @param CustomField[]|null $customFields
     */
    public function setCustomFields(?array $customFields): void
    {
        $this->customFields = $customFields;
    }

    /**
     * Returns Subscription Plan Id.
     * The ID of the subscription plan for the buyer to pay and subscribe.
     * For more information, see [Subscription Plan Checkout](https://developer.squareup.com/docs/checkout-
     * api/subscription-plan-checkout).
     */
    public function getSubscriptionPlanId(): ?string
    {
        return $this->subscriptionPlanId;
    }

    /**
     * Sets Subscription Plan Id.
     * The ID of the subscription plan for the buyer to pay and subscribe.
     * For more information, see [Subscription Plan Checkout](https://developer.squareup.com/docs/checkout-
     * api/subscription-plan-checkout).
     *
     * @maps subscription_plan_id
     */
    public function setSubscriptionPlanId(?string $subscriptionPlanId): void
    {
        $this->subscriptionPlanId = $subscriptionPlanId;
    }

    /**
     * Returns Redirect Url.
     * The confirmation page URL to redirect the buyer to after Square processes the payment.
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    /**
     * Sets Redirect Url.
     * The confirmation page URL to redirect the buyer to after Square processes the payment.
     *
     * @maps redirect_url
     */
    public function setRedirectUrl(?string $redirectUrl): void
    {
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * Returns Merchant Support Email.
     * The email address that buyers can use to contact the seller.
     */
    public function getMerchantSupportEmail(): ?string
    {
        return $this->merchantSupportEmail;
    }

    /**
     * Sets Merchant Support Email.
     * The email address that buyers can use to contact the seller.
     *
     * @maps merchant_support_email
     */
    public function setMerchantSupportEmail(?string $merchantSupportEmail): void
    {
        $this->merchantSupportEmail = $merchantSupportEmail;
    }

    /**
     * Returns Ask for Shipping Address.
     * Indicates whether to include the address fields in the payment form.
     */
    public function getAskForShippingAddress(): ?bool
    {
        return $this->askForShippingAddress;
    }

    /**
     * Sets Ask for Shipping Address.
     * Indicates whether to include the address fields in the payment form.
     *
     * @maps ask_for_shipping_address
     */
    public function setAskForShippingAddress(?bool $askForShippingAddress): void
    {
        $this->askForShippingAddress = $askForShippingAddress;
    }

    /**
     * Returns Accepted Payment Methods.
     */
    public function getAcceptedPaymentMethods(): ?AcceptedPaymentMethods
    {
        return $this->acceptedPaymentMethods;
    }

    /**
     * Sets Accepted Payment Methods.
     *
     * @maps accepted_payment_methods
     */
    public function setAcceptedPaymentMethods(?AcceptedPaymentMethods $acceptedPaymentMethods): void
    {
        $this->acceptedPaymentMethods = $acceptedPaymentMethods;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->allowTipping)) {
            $json['allow_tipping']            = $this->allowTipping;
        }
        if (isset($this->customFields)) {
            $json['custom_fields']            = $this->customFields;
        }
        if (isset($this->subscriptionPlanId)) {
            $json['subscription_plan_id']     = $this->subscriptionPlanId;
        }
        if (isset($this->redirectUrl)) {
            $json['redirect_url']             = $this->redirectUrl;
        }
        if (isset($this->merchantSupportEmail)) {
            $json['merchant_support_email']   = $this->merchantSupportEmail;
        }
        if (isset($this->askForShippingAddress)) {
            $json['ask_for_shipping_address'] = $this->askForShippingAddress;
        }
        if (isset($this->acceptedPaymentMethods)) {
            $json['accepted_payment_methods'] = $this->acceptedPaymentMethods;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
