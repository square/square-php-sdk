<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Additional details about `WALLET` type payments with the `brand` of `CASH_APP`.
 */
class CashAppDetails extends JsonSerializableType
{
    /**
     * @var ?string $buyerFullName The name of the Cash App account holder.
     */
    #[JsonProperty('buyer_full_name')]
    private ?string $buyerFullName;

    /**
     * The country of the Cash App account holder, in ISO 3166-1-alpha-2 format.
     *
     * For possible values, see [Country](entity:Country).
     *
     * @var ?string $buyerCountryCode
     */
    #[JsonProperty('buyer_country_code')]
    private ?string $buyerCountryCode;

    /**
     * @var ?string $buyerCashtag $Cashtag of the Cash App account holder.
     */
    #[JsonProperty('buyer_cashtag')]
    private ?string $buyerCashtag;

    /**
     * @param array{
     *   buyerFullName?: ?string,
     *   buyerCountryCode?: ?string,
     *   buyerCashtag?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buyerFullName = $values['buyerFullName'] ?? null;
        $this->buyerCountryCode = $values['buyerCountryCode'] ?? null;
        $this->buyerCashtag = $values['buyerCashtag'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getBuyerFullName(): ?string
    {
        return $this->buyerFullName;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerFullName(?string $value = null): self
    {
        $this->buyerFullName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBuyerCountryCode(): ?string
    {
        return $this->buyerCountryCode;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerCountryCode(?string $value = null): self
    {
        $this->buyerCountryCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBuyerCashtag(): ?string
    {
        return $this->buyerCashtag;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerCashtag(?string $value = null): self
    {
        $this->buyerCashtag = $value;
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
