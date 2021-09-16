<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Provides customer data that Square uses to deliver an invoice.
 */
class InvoiceRecipient implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $givenName;

    /**
     * @var string|null
     */
    private $familyName;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $companyName;

    /**
     * Returns Customer Id.
     *
     * The ID of the customer. This is the customer profile ID that
     * you provide when creating a draft invoice.
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the customer. This is the customer profile ID that
     * you provide when creating a draft invoice.
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Given Name.
     *
     * The recipient's given (that is, first) name.
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The recipient's given (that is, first) name.
     *
     * @maps given_name
     */
    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * Returns Family Name.
     *
     * The recipient's family (that is, last) name.
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The recipient's family (that is, last) name.
     *
     * @maps family_name
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Email Address.
     *
     * The recipient's email address.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The recipient's email address.
     *
     * @maps email_address
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Address.
     *
     * Represents a postal address in a country. The address format is based
     * on an [open-source library from Google](https://github.com/google/libaddressinput). For more
     * information,
     * see [AddressValidationMetadata](https://github.
     * com/google/libaddressinput/wiki/AddressValidationMetadata).
     * This format has dedicated fields for four address components: postal code,
     * locality (city), administrative district (state, prefecture, or province), and
     * sublocality (town or village). These components have dedicated fields in the
     * `Address` object because software sometimes behaves differently based on them.
     * For example, sales tax software may charge different amounts of sales tax
     * based on the postal code, and some software is only available in
     * certain states due to compliance reasons.
     *
     * For the remaining address components, the `Address` type provides the
     * `address_line_1` and `address_line_2` fields for free-form data entry.
     * These fields are free-form because the remaining address components have
     * too many variations around the world and typical software does not parse
     * these components. These fields enable users to enter anything they want.
     *
     * Note that, in the current implementation, all other `Address` type fields are blank.
     * These include `address_line_3`, `sublocality_2`, `sublocality_3`,
     * `administrative_district_level_2`, `administrative_district_level_3`,
     * `first_name`, `last_name`, and `organization`.
     *
     * When it comes to localization, the seller's language preferences
     * (see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-
     * seller-level-language-preferences))
     * are ignored for addresses. Even though Square products (such as Square Point of Sale
     * and the Seller Dashboard) mostly use a seller's language preference in
     * communication, when it comes to addresses, they will use English for a US address,
     * Japanese for an address in Japan, and so on.
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a postal address in a country. The address format is based
     * on an [open-source library from Google](https://github.com/google/libaddressinput). For more
     * information,
     * see [AddressValidationMetadata](https://github.
     * com/google/libaddressinput/wiki/AddressValidationMetadata).
     * This format has dedicated fields for four address components: postal code,
     * locality (city), administrative district (state, prefecture, or province), and
     * sublocality (town or village). These components have dedicated fields in the
     * `Address` object because software sometimes behaves differently based on them.
     * For example, sales tax software may charge different amounts of sales tax
     * based on the postal code, and some software is only available in
     * certain states due to compliance reasons.
     *
     * For the remaining address components, the `Address` type provides the
     * `address_line_1` and `address_line_2` fields for free-form data entry.
     * These fields are free-form because the remaining address components have
     * too many variations around the world and typical software does not parse
     * these components. These fields enable users to enter anything they want.
     *
     * Note that, in the current implementation, all other `Address` type fields are blank.
     * These include `address_line_3`, `sublocality_2`, `sublocality_3`,
     * `administrative_district_level_2`, `administrative_district_level_3`,
     * `first_name`, `last_name`, and `organization`.
     *
     * When it comes to localization, the seller's language preferences
     * (see [Language preferences](https://developer.squareup.com/docs/locations-api#location-specific-and-
     * seller-level-language-preferences))
     * are ignored for addresses. Even though Square products (such as Square Point of Sale
     * and the Seller Dashboard) mostly use a seller's language preference in
     * communication, when it comes to addresses, they will use English for a US address,
     * Japanese for an address in Japan, and so on.
     *
     * @maps address
     */
    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Phone Number.
     *
     * The recipient's phone number.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The recipient's phone number.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Company Name.
     *
     * The name of the recipient's company.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Sets Company Name.
     *
     * The name of the recipient's company.
     *
     * @maps company_name
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->customerId)) {
            $json['customer_id']   = $this->customerId;
        }
        if (isset($this->givenName)) {
            $json['given_name']    = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']   = $this->familyName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        if (isset($this->address)) {
            $json['address']       = $this->address;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']  = $this->phoneNumber;
        }
        if (isset($this->companyName)) {
            $json['company_name']  = $this->companyName;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
