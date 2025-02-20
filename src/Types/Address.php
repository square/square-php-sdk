<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a postal address in a country.
 * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
 */
class Address extends JsonSerializableType
{
    /**
     * The first line of the address.
     *
     * Fields that start with `address_line` provide the address's most specific
     * details, like street number, street name, and building name. They do *not*
     * provide less specific details like city, state/province, or country (these
     * details are provided in other fields).
     *
     * @var ?string $addressLine1
     */
    #[JsonProperty('address_line_1')]
    private ?string $addressLine1;

    /**
     * @var ?string $addressLine2 The second line of the address, if any.
     */
    #[JsonProperty('address_line_2')]
    private ?string $addressLine2;

    /**
     * @var ?string $addressLine3 The third line of the address, if any.
     */
    #[JsonProperty('address_line_3')]
    private ?string $addressLine3;

    /**
     * @var ?string $locality The city or town of the address. For a full list of field meanings by country, see [Working with Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     */
    #[JsonProperty('locality')]
    private ?string $locality;

    /**
     * @var ?string $sublocality A civil region within the address's `locality`, if any.
     */
    #[JsonProperty('sublocality')]
    private ?string $sublocality;

    /**
     * @var ?string $sublocality2 A civil region within the address's `sublocality`, if any.
     */
    #[JsonProperty('sublocality_2')]
    private ?string $sublocality2;

    /**
     * @var ?string $sublocality3 A civil region within the address's `sublocality_2`, if any.
     */
    #[JsonProperty('sublocality_3')]
    private ?string $sublocality3;

    /**
     * A civil entity within the address's country. In the US, this
     * is the state. For a full list of field meanings by country, see [Working with Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     *
     * @var ?string $administrativeDistrictLevel1
     */
    #[JsonProperty('administrative_district_level_1')]
    private ?string $administrativeDistrictLevel1;

    /**
     * A civil entity within the address's `administrative_district_level_1`.
     * In the US, this is the county.
     *
     * @var ?string $administrativeDistrictLevel2
     */
    #[JsonProperty('administrative_district_level_2')]
    private ?string $administrativeDistrictLevel2;

    /**
     * A civil entity within the address's `administrative_district_level_2`,
     * if any.
     *
     * @var ?string $administrativeDistrictLevel3
     */
    #[JsonProperty('administrative_district_level_3')]
    private ?string $administrativeDistrictLevel3;

    /**
     * @var ?string $postalCode The address's postal code. For a full list of field meanings by country, see [Working with Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     */
    #[JsonProperty('postal_code')]
    private ?string $postalCode;

    /**
     * The address's country, in the two-letter format of ISO 3166. For example, `US` or `FR`.
     * See [Country](#type-country) for possible values
     *
     * @var ?value-of<Country> $country
     */
    #[JsonProperty('country')]
    private ?string $country;

    /**
     * @var ?string $firstName Optional first name when it's representing recipient.
     */
    #[JsonProperty('first_name')]
    private ?string $firstName;

    /**
     * @var ?string $lastName Optional last name when it's representing recipient.
     */
    #[JsonProperty('last_name')]
    private ?string $lastName;

    /**
     * @param array{
     *   addressLine1?: ?string,
     *   addressLine2?: ?string,
     *   addressLine3?: ?string,
     *   locality?: ?string,
     *   sublocality?: ?string,
     *   sublocality2?: ?string,
     *   sublocality3?: ?string,
     *   administrativeDistrictLevel1?: ?string,
     *   administrativeDistrictLevel2?: ?string,
     *   administrativeDistrictLevel3?: ?string,
     *   postalCode?: ?string,
     *   country?: ?value-of<Country>,
     *   firstName?: ?string,
     *   lastName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->addressLine1 = $values['addressLine1'] ?? null;
        $this->addressLine2 = $values['addressLine2'] ?? null;
        $this->addressLine3 = $values['addressLine3'] ?? null;
        $this->locality = $values['locality'] ?? null;
        $this->sublocality = $values['sublocality'] ?? null;
        $this->sublocality2 = $values['sublocality2'] ?? null;
        $this->sublocality3 = $values['sublocality3'] ?? null;
        $this->administrativeDistrictLevel1 = $values['administrativeDistrictLevel1'] ?? null;
        $this->administrativeDistrictLevel2 = $values['administrativeDistrictLevel2'] ?? null;
        $this->administrativeDistrictLevel3 = $values['administrativeDistrictLevel3'] ?? null;
        $this->postalCode = $values['postalCode'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * @param ?string $value
     */
    public function setAddressLine1(?string $value = null): self
    {
        $this->addressLine1 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * @param ?string $value
     */
    public function setAddressLine2(?string $value = null): self
    {
        $this->addressLine2 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * @param ?string $value
     */
    public function setAddressLine3(?string $value = null): self
    {
        $this->addressLine3 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }

    /**
     * @param ?string $value
     */
    public function setLocality(?string $value = null): self
    {
        $this->locality = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSublocality(): ?string
    {
        return $this->sublocality;
    }

    /**
     * @param ?string $value
     */
    public function setSublocality(?string $value = null): self
    {
        $this->sublocality = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSublocality2(): ?string
    {
        return $this->sublocality2;
    }

    /**
     * @param ?string $value
     */
    public function setSublocality2(?string $value = null): self
    {
        $this->sublocality2 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSublocality3(): ?string
    {
        return $this->sublocality3;
    }

    /**
     * @param ?string $value
     */
    public function setSublocality3(?string $value = null): self
    {
        $this->sublocality3 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdministrativeDistrictLevel1(): ?string
    {
        return $this->administrativeDistrictLevel1;
    }

    /**
     * @param ?string $value
     */
    public function setAdministrativeDistrictLevel1(?string $value = null): self
    {
        $this->administrativeDistrictLevel1 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdministrativeDistrictLevel2(): ?string
    {
        return $this->administrativeDistrictLevel2;
    }

    /**
     * @param ?string $value
     */
    public function setAdministrativeDistrictLevel2(?string $value = null): self
    {
        $this->administrativeDistrictLevel2 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAdministrativeDistrictLevel3(): ?string
    {
        return $this->administrativeDistrictLevel3;
    }

    /**
     * @param ?string $value
     */
    public function setAdministrativeDistrictLevel3(?string $value = null): self
    {
        $this->administrativeDistrictLevel3 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param ?string $value
     */
    public function setPostalCode(?string $value = null): self
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
     * @return ?string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param ?string $value
     */
    public function setFirstName(?string $value = null): self
    {
        $this->firstName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param ?string $value
     */
    public function setLastName(?string $value = null): self
    {
        $this->lastName = $value;
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
