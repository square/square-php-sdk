<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the details of a tender with `type` `BUY_NOW_PAY_LATER`.
 */
class TenderBuyNowPayLaterDetails extends JsonSerializableType
{
    /**
     * The Buy Now Pay Later brand.
     * See [Brand](#type-brand) for possible values
     *
     * @var ?value-of<TenderBuyNowPayLaterDetailsBrand> $buyNowPayLaterBrand
     */
    #[JsonProperty('buy_now_pay_later_brand')]
    private ?string $buyNowPayLaterBrand;

    /**
     * The buy now pay later payment's current state (such as `AUTHORIZED` or
     * `CAPTURED`). See [TenderBuyNowPayLaterDetailsStatus](entity:TenderBuyNowPayLaterDetailsStatus)
     * for possible values.
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<TenderBuyNowPayLaterDetailsStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   buyNowPayLaterBrand?: ?value-of<TenderBuyNowPayLaterDetailsBrand>,
     *   status?: ?value-of<TenderBuyNowPayLaterDetailsStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buyNowPayLaterBrand = $values['buyNowPayLaterBrand'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return ?value-of<TenderBuyNowPayLaterDetailsBrand>
     */
    public function getBuyNowPayLaterBrand(): ?string
    {
        return $this->buyNowPayLaterBrand;
    }

    /**
     * @param ?value-of<TenderBuyNowPayLaterDetailsBrand> $value
     */
    public function setBuyNowPayLaterBrand(?string $value = null): self
    {
        $this->buyNowPayLaterBrand = $value;
        return $this;
    }

    /**
     * @return ?value-of<TenderBuyNowPayLaterDetailsStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TenderBuyNowPayLaterDetailsStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
