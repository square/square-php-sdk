<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The customer address filter. This filter is used in a [CustomerCustomAttributeFilterValue](entity:CustomerCustomAttributeFilterValue) filter when
 * searching by an `Address`-type custom attribute.
 */
class CustomerAddressFilter extends JsonSerializableType
{
    /**
     * @var ?CustomerTextFilter $postalCode The postal code to search for. Only an `exact` match is supported.
     */
    #[JsonProperty('postal_code')]
    private ?CustomerTextFilter $postalCode;

    /**
     * The country code to search for.
     * See [Country](#type-country) for possible values
     *
     * @var ?value-of<Country> $country
     */
    #[JsonProperty('country')]
    private ?string $country;

    /**
     * @param array{
     *   postalCode?: ?CustomerTextFilter,
     *   country?: ?value-of<Country>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->postalCode = $values['postalCode'] ?? null;
        $this->country = $values['country'] ?? null;
    }

    /**
     * @return ?CustomerTextFilter
     */
    public function getPostalCode(): ?CustomerTextFilter
    {
        return $this->postalCode;
    }

    /**
     * @param ?CustomerTextFilter $value
     */
    public function setPostalCode(?CustomerTextFilter $value = null): self
    {
        $this->postalCode = $value;
        return $this;
    }

    /**
     * @return ?value-of<Country>
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param ?value-of<Country> $value
     */
    public function setCountry(?string $value = null): self
    {
        $this->country = $value;
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
