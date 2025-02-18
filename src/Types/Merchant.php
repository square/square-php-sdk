<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a business that sells with Square.
 */
class Merchant extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-issued ID of the merchant.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $businessName The name of the merchant's overall business.
     */
    #[JsonProperty('business_name')]
    private ?string $businessName;

    /**
     * The country code associated with the merchant, in the two-letter format of ISO 3166. For example, `US` or `JP`.
     * See [Country](#type-country) for possible values
     *
     * @var value-of<Country> $country
     */
    #[JsonProperty('country')]
    private string $country;

    /**
     * @var ?string $languageCode The code indicating the [language preferences](https://developer.squareup.com/docs/build-basics/general-considerations/language-preferences) of the merchant, in [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A). For example, `en-US` or `fr-CA`.
     */
    #[JsonProperty('language_code')]
    private ?string $languageCode;

    /**
     * The currency associated with the merchant, in ISO 4217 format. For example, the currency code for US dollars is `USD`.
     * See [Currency](#type-currency) for possible values
     *
     * @var ?value-of<Currency> $currency
     */
    #[JsonProperty('currency')]
    private ?string $currency;

    /**
     * The merchant's status.
     * See [MerchantStatus](#type-merchantstatus) for possible values
     *
     * @var ?value-of<MerchantStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $mainLocationId The ID of the [main `Location`](https://developer.squareup.com/docs/locations-api#about-the-main-location) for this merchant.
     */
    #[JsonProperty('main_location_id')]
    private ?string $mainLocationId;

    /**
     * The time when the merchant was created, in RFC 3339 format.
     *    For more information, see [Working with Dates](https://developer.squareup.com/docs/build-basics/working-with-dates).
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @param array{
     *   country: value-of<Country>,
     *   id?: ?string,
     *   businessName?: ?string,
     *   languageCode?: ?string,
     *   currency?: ?value-of<Currency>,
     *   status?: ?value-of<MerchantStatus>,
     *   mainLocationId?: ?string,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->businessName = $values['businessName'] ?? null;
        $this->country = $values['country'];
        $this->languageCode = $values['languageCode'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->mainLocationId = $values['mainLocationId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBusinessName(): ?string
    {
        return $this->businessName;
    }

    /**
     * @param ?string $value
     */
    public function setBusinessName(?string $value = null): self
    {
        $this->businessName = $value;
        return $this;
    }

    /**
     * @return value-of<Country>
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param value-of<Country> $value
     */
    public function setCountry(string $value): self
    {
        $this->country = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param ?string $value
     */
    public function setLanguageCode(?string $value = null): self
    {
        $this->languageCode = $value;
        return $this;
    }

    /**
     * @return ?value-of<Currency>
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param ?value-of<Currency> $value
     */
    public function setCurrency(?string $value = null): self
    {
        $this->currency = $value;
        return $this;
    }

    /**
     * @return ?value-of<MerchantStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<MerchantStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMainLocationId(): ?string
    {
        return $this->mainLocationId;
    }

    /**
     * @param ?string $value
     */
    public function setMainLocationId(?string $value = null): self
    {
        $this->mainLocationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
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
