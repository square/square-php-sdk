<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the body parameters that can be included in a request to the
 * `UpdateCustomer` endpoint.
 */
class UpdateCustomerRequest implements \JsonSerializable
{
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
    private $companyName;

    /**
     * @var string|null
     */
    private $nickname;

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
    private $referenceId;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $birthday;

    /**
     * @var int|null
     */
    private $version;

    /**
     * Returns Given Name.
     *
     * The given name (that is, the first name) associated with the customer profile.
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The given name (that is, the first name) associated with the customer profile.
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
     * The family name (that is, the last name) associated with the customer profile.
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The family name (that is, the last name) associated with the customer profile.
     *
     * @maps family_name
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Company Name.
     *
     * A business name associated with the customer profile.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Sets Company Name.
     *
     * A business name associated with the customer profile.
     *
     * @maps company_name
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * Returns Nickname.
     *
     * A nickname for the customer profile.
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * Sets Nickname.
     *
     * A nickname for the customer profile.
     *
     * @maps nickname
     */
    public function setNickname(?string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * Returns Email Address.
     *
     * The email address associated with the customer profile.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address associated with the customer profile.
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
     * The 11-digit phone number associated with the customer profile.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The 11-digit phone number associated with the customer profile.
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Reference Id.
     *
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Note.
     *
     * A custom note associated with the customer profile.
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * A custom note associated with the customer profile.
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Birthday.
     *
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     * You can also specify this value in `YYYY-MM-DD` format.
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * Sets Birthday.
     *
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     * You can also specify this value in `YYYY-MM-DD` format.
     *
     * @maps birthday
     */
    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Returns Version.
     *
     * The current version of the customer profile.
     *
     * As a best practice, you should include this field to enable [optimistic concurrency](https:
     * //developer.squareup.com/docs/working-with-apis/optimistic-concurrency) control. For more
     * information, see [Update a customer profile](https://developer.squareup.com/docs/customers-api/use-
     * the-api/keep-records#update-a-customer-profile).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The current version of the customer profile.
     *
     * As a best practice, you should include this field to enable [optimistic concurrency](https:
     * //developer.squareup.com/docs/working-with-apis/optimistic-concurrency) control. For more
     * information, see [Update a customer profile](https://developer.squareup.com/docs/customers-api/use-
     * the-api/keep-records#update-a-customer-profile).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->givenName)) {
            $json['given_name']    = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']   = $this->familyName;
        }
        if (isset($this->companyName)) {
            $json['company_name']  = $this->companyName;
        }
        if (isset($this->nickname)) {
            $json['nickname']      = $this->nickname;
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
        if (isset($this->referenceId)) {
            $json['reference_id']  = $this->referenceId;
        }
        if (isset($this->note)) {
            $json['note']          = $this->note;
        }
        if (isset($this->birthday)) {
            $json['birthday']      = $this->birthday;
        }
        if (isset($this->version)) {
            $json['version']       = $this->version;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
