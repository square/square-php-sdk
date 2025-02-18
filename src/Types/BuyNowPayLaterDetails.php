<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Additional details about a Buy Now Pay Later payment type.
 */
class BuyNowPayLaterDetails extends JsonSerializableType
{
    /**
     * The brand used for the Buy Now Pay Later payment.
     * The brand can be `AFTERPAY`, `CLEARPAY` or `UNKNOWN`.
     *
     * @var ?string $brand
     */
    #[JsonProperty('brand')]
    private ?string $brand;

    /**
     * Details about an Afterpay payment. These details are only populated if the `brand` is
     * `AFTERPAY`.
     *
     * @var ?AfterpayDetails $afterpayDetails
     */
    #[JsonProperty('afterpay_details')]
    private ?AfterpayDetails $afterpayDetails;

    /**
     * Details about a Clearpay payment. These details are only populated if the `brand` is
     * `CLEARPAY`.
     *
     * @var ?ClearpayDetails $clearpayDetails
     */
    #[JsonProperty('clearpay_details')]
    private ?ClearpayDetails $clearpayDetails;

    /**
     * @param array{
     *   brand?: ?string,
     *   afterpayDetails?: ?AfterpayDetails,
     *   clearpayDetails?: ?ClearpayDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->brand = $values['brand'] ?? null;
        $this->afterpayDetails = $values['afterpayDetails'] ?? null;
        $this->clearpayDetails = $values['clearpayDetails'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param ?string $value
     */
    public function setBrand(?string $value = null): self
    {
        $this->brand = $value;
        return $this;
    }

    /**
     * @return ?AfterpayDetails
     */
    public function getAfterpayDetails(): ?AfterpayDetails
    {
        return $this->afterpayDetails;
    }

    /**
     * @param ?AfterpayDetails $value
     */
    public function setAfterpayDetails(?AfterpayDetails $value = null): self
    {
        $this->afterpayDetails = $value;
        return $this;
    }

    /**
     * @return ?ClearpayDetails
     */
    public function getClearpayDetails(): ?ClearpayDetails
    {
        return $this->clearpayDetails;
    }

    /**
     * @param ?ClearpayDetails $value
     */
    public function setClearpayDetails(?ClearpayDetails $value = null): self
    {
        $this->clearpayDetails = $value;
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
