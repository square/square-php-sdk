<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Additional details about a Buy Now Pay Later payment type.
 */
class BuyNowPayLaterDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $brand;

    /**
     * @var AfterpayDetails|null
     */
    private $afterpayDetails;

    /**
     * Returns Brand.
     *
     * The brand used for the Buy Now Pay Later payment.
     * The brand can be `AFTERPAY` or `UNKNOWN`.
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * Sets Brand.
     *
     * The brand used for the Buy Now Pay Later payment.
     * The brand can be `AFTERPAY` or `UNKNOWN`.
     *
     * @maps brand
     */
    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * Returns Afterpay Details.
     *
     * Additional details about Afterpay payments.
     */
    public function getAfterpayDetails(): ?AfterpayDetails
    {
        return $this->afterpayDetails;
    }

    /**
     * Sets Afterpay Details.
     *
     * Additional details about Afterpay payments.
     *
     * @maps afterpay_details
     */
    public function setAfterpayDetails(?AfterpayDetails $afterpayDetails): void
    {
        $this->afterpayDetails = $afterpayDetails;
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
        if (isset($this->brand)) {
            $json['brand']            = $this->brand;
        }
        if (isset($this->afterpayDetails)) {
            $json['afterpay_details'] = $this->afterpayDetails;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
