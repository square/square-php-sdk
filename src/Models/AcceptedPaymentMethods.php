<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class AcceptedPaymentMethods implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $applePay;

    /**
     * @var bool|null
     */
    private $googlePay;

    /**
     * @var bool|null
     */
    private $cashAppPay;

    /**
     * @var bool|null
     */
    private $afterpayClearpay;

    /**
     * Returns Apple Pay.
     * Whether Apple Pay is accepted at checkout
     */
    public function getApplePay(): ?bool
    {
        return $this->applePay;
    }

    /**
     * Sets Apple Pay.
     * Whether Apple Pay is accepted at checkout
     *
     * @maps apple_pay
     */
    public function setApplePay(?bool $applePay): void
    {
        $this->applePay = $applePay;
    }

    /**
     * Returns Google Pay.
     * Whether Google Pay is accepted at checkout
     */
    public function getGooglePay(): ?bool
    {
        return $this->googlePay;
    }

    /**
     * Sets Google Pay.
     * Whether Google Pay is accepted at checkout
     *
     * @maps google_pay
     */
    public function setGooglePay(?bool $googlePay): void
    {
        $this->googlePay = $googlePay;
    }

    /**
     * Returns Cash App Pay.
     * Whether Cash App Pay is accepted at checkout
     */
    public function getCashAppPay(): ?bool
    {
        return $this->cashAppPay;
    }

    /**
     * Sets Cash App Pay.
     * Whether Cash App Pay is accepted at checkout
     *
     * @maps cash_app_pay
     */
    public function setCashAppPay(?bool $cashAppPay): void
    {
        $this->cashAppPay = $cashAppPay;
    }

    /**
     * Returns Afterpay Clearpay.
     * Whether Afterpay/Clearpay is accepted at checkout
     */
    public function getAfterpayClearpay(): ?bool
    {
        return $this->afterpayClearpay;
    }

    /**
     * Sets Afterpay Clearpay.
     * Whether Afterpay/Clearpay is accepted at checkout
     *
     * @maps afterpay_clearpay
     */
    public function setAfterpayClearpay(?bool $afterpayClearpay): void
    {
        $this->afterpayClearpay = $afterpayClearpay;
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
        if (isset($this->applePay)) {
            $json['apple_pay']         = $this->applePay;
        }
        if (isset($this->googlePay)) {
            $json['google_pay']        = $this->googlePay;
        }
        if (isset($this->cashAppPay)) {
            $json['cash_app_pay']      = $this->cashAppPay;
        }
        if (isset($this->afterpayClearpay)) {
            $json['afterpay_clearpay'] = $this->afterpayClearpay;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
