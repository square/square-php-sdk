<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class PaymentBalanceActivityTaxOnFeeDetail implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $taxRateDescription;

    /**
     * Returns Payment Id.
     * The ID of the payment associated with this activity.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     * The ID of the payment associated with this activity.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Tax Rate Description.
     * The description of the tax rate being applied. For example: "GST", "HST".
     */
    public function getTaxRateDescription(): ?string
    {
        return $this->taxRateDescription;
    }

    /**
     * Sets Tax Rate Description.
     * The description of the tax rate being applied. For example: "GST", "HST".
     *
     * @maps tax_rate_description
     */
    public function setTaxRateDescription(?string $taxRateDescription): void
    {
        $this->taxRateDescription = $taxRateDescription;
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
        if (isset($this->paymentId)) {
            $json['payment_id']           = $this->paymentId;
        }
        if (isset($this->taxRateDescription)) {
            $json['tax_rate_description'] = $this->taxRateDescription;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
