<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a postal address in a country.
 * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
 * basics/working-with-addresses).
 */
class Address implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $addressLine1;

    /**
     * @var string|null
     */
    private $addressLine2;

    /**
     * @var string|null
     */
    private $addressLine3;

    /**
     * @var string|null
     */
    private $locality;

    /**
     * @var string|null
     */
    private $sublocality;

    /**
     * @var string|null
     */
    private $administrativeDistrictLevel1;

    /**
     * @var string|null
     */
    private $postalCode;

    /**
     * @var string|null
     */
    private $country;

    /**
     * Returns Address Line 1.
     *
     * The first line of the address.
     *
     * Fields that start with `address_line` provide the address's most specific
     * details, like street number, street name, and building name. They do *not*
     * provide less specific details like city, state/province, or country (these
     * details are provided in other fields).
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * Sets Address Line 1.
     *
     * The first line of the address.
     *
     * Fields that start with `address_line` provide the address's most specific
     * details, like street number, street name, and building name. They do *not*
     * provide less specific details like city, state/province, or country (these
     * details are provided in other fields).
     *
     * @maps address_line_1
     */
    public function setAddressLine1(?string $addressLine1): void
    {
        $this->addressLine1 = $addressLine1;
    }

    /**
     * Returns Address Line 2.
     *
     * The second line of the address, if any.
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * Sets Address Line 2.
     *
     * The second line of the address, if any.
     *
     * @maps address_line_2
     */
    public function setAddressLine2(?string $addressLine2): void
    {
        $this->addressLine2 = $addressLine2;
    }

    /**
     * Returns Address Line 3.
     *
     * The third line of the address, if any.
     */
    public function getAddressLine3(): ?string
    {
        return $this->addressLine3;
    }

    /**
     * Sets Address Line 3.
     *
     * The third line of the address, if any.
     *
     * @maps address_line_3
     */
    public function setAddressLine3(?string $addressLine3): void
    {
        $this->addressLine3 = $addressLine3;
    }

    /**
     * Returns Locality.
     *
     * The city or town of the address. For a full list of field meanings by country, see [Working with
     * Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     */
    public function getLocality(): ?string
    {
        return $this->locality;
    }

    /**
     * Sets Locality.
     *
     * The city or town of the address. For a full list of field meanings by country, see [Working with
     * Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     *
     * @maps locality
     */
    public function setLocality(?string $locality): void
    {
        $this->locality = $locality;
    }

    /**
     * Returns Sublocality.
     *
     * A civil region within the address's `locality`, if any.
     */
    public function getSublocality(): ?string
    {
        return $this->sublocality;
    }

    /**
     * Sets Sublocality.
     *
     * A civil region within the address's `locality`, if any.
     *
     * @maps sublocality
     */
    public function setSublocality(?string $sublocality): void
    {
        $this->sublocality = $sublocality;
    }

    /**
     * Returns Administrative District Level 1.
     *
     * A civil entity within the address's country. In the US, this
     * is the state. For a full list of field meanings by country, see [Working with Addresses](https:
     * //developer.squareup.com/docs/build-basics/working-with-addresses).
     */
    public function getAdministrativeDistrictLevel1(): ?string
    {
        return $this->administrativeDistrictLevel1;
    }

    /**
     * Sets Administrative District Level 1.
     *
     * A civil entity within the address's country. In the US, this
     * is the state. For a full list of field meanings by country, see [Working with Addresses](https:
     * //developer.squareup.com/docs/build-basics/working-with-addresses).
     *
     * @maps administrative_district_level_1
     */
    public function setAdministrativeDistrictLevel1(?string $administrativeDistrictLevel1): void
    {
        $this->administrativeDistrictLevel1 = $administrativeDistrictLevel1;
    }

    /**
     * Returns Postal Code.
     *
     * The address's postal code. For a full list of field meanings by country, see [Working with
     * Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Sets Postal Code.
     *
     * The address's postal code. For a full list of field meanings by country, see [Working with
     * Addresses](https://developer.squareup.com/docs/build-basics/working-with-addresses).
     *
     * @maps postal_code
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Returns Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     *
     * @maps country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
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
        if (isset($this->addressLine1)) {
            $json['address_line_1']                  = $this->addressLine1;
        }
        if (isset($this->addressLine2)) {
            $json['address_line_2']                  = $this->addressLine2;
        }
        if (isset($this->addressLine3)) {
            $json['address_line_3']                  = $this->addressLine3;
        }
        if (isset($this->locality)) {
            $json['locality']                        = $this->locality;
        }
        if (isset($this->sublocality)) {
            $json['sublocality']                     = $this->sublocality;
        }
        if (isset($this->administrativeDistrictLevel1)) {
            $json['administrative_district_level_1'] = $this->administrativeDistrictLevel1;
        }
        if (isset($this->postalCode)) {
            $json['postal_code']                     = $this->postalCode;
        }
        if (isset($this->country)) {
            $json['country']                         = $this->country;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
