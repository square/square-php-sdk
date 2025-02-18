<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Address;
use Square\Types\CustomerTaxIds;

class UpdateCustomerRequest extends JsonSerializableType
{
    /**
     * @var string $customerId The ID of the customer to update.
     */
    private string $customerId;

    /**
     * The given name (that is, the first name) associated with the customer profile.
     *
     * The maximum length for this value is 300 characters.
     *
     * @var ?string $givenName
     */
    #[JsonProperty('given_name')]
    private ?string $givenName;

    /**
     * The family name (that is, the last name) associated with the customer profile.
     *
     * The maximum length for this value is 300 characters.
     *
     * @var ?string $familyName
     */
    #[JsonProperty('family_name')]
    private ?string $familyName;

    /**
     * A business name associated with the customer profile.
     *
     * The maximum length for this value is 500 characters.
     *
     * @var ?string $companyName
     */
    #[JsonProperty('company_name')]
    private ?string $companyName;

    /**
     * A nickname for the customer profile.
     *
     * The maximum length for this value is 100 characters.
     *
     * @var ?string $nickname
     */
    #[JsonProperty('nickname')]
    private ?string $nickname;

    /**
     * The email address associated with the customer profile.
     *
     * The maximum length for this value is 254 characters.
     *
     * @var ?string $emailAddress
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * The physical address associated with the customer profile. Only new or changed fields are required in the request.
     *
     * For maximum length constraints, see [Customer addresses](https://developer.squareup.com/docs/customers-api/use-the-api/keep-records#address).
     * The `first_name` and `last_name` fields are ignored if they are present in the request.
     *
     * @var ?Address $address
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * The phone number associated with the customer profile. The phone number must be valid and can contain
     * 9–16 digits, with an optional `+` prefix and country code. For more information, see
     * [Customer phone numbers](https://developer.squareup.com/docs/customers-api/use-the-api/keep-records#phone-number).
     *
     * @var ?string $phoneNumber
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     *
     * The maximum length for this value is 100 characters.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @var ?string $note A custom note associated with the customer profile.
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * The birthday associated with the customer profile, in `YYYY-MM-DD` or `MM-DD` format. For example,
     * specify `1998-09-21` for September 21, 1998, or `09-21` for September 21. Birthdays are returned in `YYYY-MM-DD`
     * format, where `YYYY` is the specified birth year or `0000` if a birth year is not specified.
     *
     * @var ?string $birthday
     */
    #[JsonProperty('birthday')]
    private ?string $birthday;

    /**
     * The current version of the customer profile.
     *
     * As a best practice, you should include this field to enable [optimistic concurrency](https://developer.squareup.com/docs/build-basics/common-api-patterns/optimistic-concurrency) control. For more information, see [Update a customer profile](https://developer.squareup.com/docs/customers-api/use-the-api/keep-records#update-a-customer-profile).
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The tax ID associated with the customer profile. This field is available only for customers of sellers
     * in EU countries or the United Kingdom. For more information,
     * see [Customer tax IDs](https://developer.squareup.com/docs/customers-api/what-it-does#customer-tax-ids).
     *
     * @var ?CustomerTaxIds $taxIds
     */
    #[JsonProperty('tax_ids')]
    private ?CustomerTaxIds $taxIds;

    /**
     * @param array{
     *   customerId: string,
     *   givenName?: ?string,
     *   familyName?: ?string,
     *   companyName?: ?string,
     *   nickname?: ?string,
     *   emailAddress?: ?string,
     *   address?: ?Address,
     *   phoneNumber?: ?string,
     *   referenceId?: ?string,
     *   note?: ?string,
     *   birthday?: ?string,
     *   version?: ?int,
     *   taxIds?: ?CustomerTaxIds,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerId = $values['customerId'];
        $this->givenName = $values['givenName'] ?? null;
        $this->familyName = $values['familyName'] ?? null;
        $this->companyName = $values['companyName'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->birthday = $values['birthday'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->taxIds = $values['taxIds'] ?? null;
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * @param ?string $value
     */
    public function setGivenName(?string $value = null): self
    {
        $this->givenName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * @param ?string $value
     */
    public function setFamilyName(?string $value = null): self
    {
        $this->familyName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param ?string $value
     */
    public function setCompanyName(?string $value = null): self
    {
        $this->companyName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * @param ?string $value
     */
    public function setNickname(?string $value = null): self
    {
        $this->nickname = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setEmailAddress(?string $value = null): self
    {
        $this->emailAddress = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param ?Address $value
     */
    public function setAddress(?Address $value = null): self
    {
        $this->address = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setPhoneNumber(?string $value = null): self
    {
        $this->phoneNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * @param ?string $value
     */
    public function setBirthday(?string $value = null): self
    {
        $this->birthday = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?CustomerTaxIds
     */
    public function getTaxIds(): ?CustomerTaxIds
    {
        return $this->taxIds;
    }

    /**
     * @param ?CustomerTaxIds $value
     */
    public function setTaxIds(?CustomerTaxIds $value = null): self
    {
        $this->taxIds = $value;
        return $this;
    }
}
