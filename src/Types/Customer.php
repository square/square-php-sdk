<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a Square customer profile in the Customer Directory of a Square seller.
 */
class Customer extends JsonSerializableType
{
    /**
     * A unique Square-assigned ID for the customer profile.
     *
     * If you need this ID for an API request, use the ID returned when you created the customer profile or call the [SearchCustomers](api-endpoint:Customers-SearchCustomers)
     * or [ListCustomers](api-endpoint:Customers-ListCustomers) endpoint.
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $createdAt The timestamp when the customer profile was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the customer profile was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $givenName The given name (that is, the first name) associated with the customer profile.
     */
    #[JsonProperty('given_name')]
    private ?string $givenName;

    /**
     * @var ?string $familyName The family name (that is, the last name) associated with the customer profile.
     */
    #[JsonProperty('family_name')]
    private ?string $familyName;

    /**
     * @var ?string $nickname A nickname for the customer profile.
     */
    #[JsonProperty('nickname')]
    private ?string $nickname;

    /**
     * @var ?string $companyName A business name associated with the customer profile.
     */
    #[JsonProperty('company_name')]
    private ?string $companyName;

    /**
     * @var ?string $emailAddress The email address associated with the customer profile.
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * @var ?Address $address The physical address associated with the customer profile.
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * @var ?string $phoneNumber The phone number associated with the customer profile.
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * The birthday associated with the customer profile, in `YYYY-MM-DD` format. For example, `1998-09-21`
     * represents September 21, 1998, and `0000-09-21` represents September 21 (without a birth year).
     *
     * @var ?string $birthday
     */
    #[JsonProperty('birthday')]
    private ?string $birthday;

    /**
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
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
     * @var ?CustomerPreferences $preferences Represents general customer preferences.
     */
    #[JsonProperty('preferences')]
    private ?CustomerPreferences $preferences;

    /**
     * The method used to create the customer profile.
     * See [CustomerCreationSource](#type-customercreationsource) for possible values
     *
     * @var ?value-of<CustomerCreationSource> $creationSource
     */
    #[JsonProperty('creation_source')]
    private ?string $creationSource;

    /**
     * @var ?array<string> $groupIds The IDs of [customer groups](entity:CustomerGroup) the customer belongs to.
     */
    #[JsonProperty('group_ids'), ArrayType(['string'])]
    private ?array $groupIds;

    /**
     * @var ?array<string> $segmentIds The IDs of [customer segments](entity:CustomerSegment) the customer belongs to.
     */
    #[JsonProperty('segment_ids'), ArrayType(['string'])]
    private ?array $segmentIds;

    /**
     * @var ?int $version The Square-assigned version number of the customer profile. The version number is incremented each time an update is committed to the customer profile, except for changes to customer segment membership.
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The tax ID associated with the customer profile. This field is present only for customers of sellers in EU countries or the United Kingdom.
     * For more information, see [Customer tax IDs](https://developer.squareup.com/docs/customers-api/what-it-does#customer-tax-ids).
     *
     * @var ?CustomerTaxIds $taxIds
     */
    #[JsonProperty('tax_ids')]
    private ?CustomerTaxIds $taxIds;

    /**
     * @param array{
     *   id?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   givenName?: ?string,
     *   familyName?: ?string,
     *   nickname?: ?string,
     *   companyName?: ?string,
     *   emailAddress?: ?string,
     *   address?: ?Address,
     *   phoneNumber?: ?string,
     *   birthday?: ?string,
     *   referenceId?: ?string,
     *   note?: ?string,
     *   preferences?: ?CustomerPreferences,
     *   creationSource?: ?value-of<CustomerCreationSource>,
     *   groupIds?: ?array<string>,
     *   segmentIds?: ?array<string>,
     *   version?: ?int,
     *   taxIds?: ?CustomerTaxIds,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->givenName = $values['givenName'] ?? null;
        $this->familyName = $values['familyName'] ?? null;
        $this->nickname = $values['nickname'] ?? null;
        $this->companyName = $values['companyName'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->birthday = $values['birthday'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->preferences = $values['preferences'] ?? null;
        $this->creationSource = $values['creationSource'] ?? null;
        $this->groupIds = $values['groupIds'] ?? null;
        $this->segmentIds = $values['segmentIds'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->taxIds = $values['taxIds'] ?? null;
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
        $this->_setField('id');
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
        $this->_setField('createdAt');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        $this->_setField('updatedAt');
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
        $this->_setField('givenName');
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
        $this->_setField('familyName');
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
        $this->_setField('nickname');
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
        $this->_setField('companyName');
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
        $this->_setField('emailAddress');
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
        $this->_setField('address');
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
        $this->_setField('phoneNumber');
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
        $this->_setField('birthday');
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
        $this->_setField('referenceId');
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
        $this->_setField('note');
        return $this;
    }

    /**
     * @return ?CustomerPreferences
     */
    public function getPreferences(): ?CustomerPreferences
    {
        return $this->preferences;
    }

    /**
     * @param ?CustomerPreferences $value
     */
    public function setPreferences(?CustomerPreferences $value = null): self
    {
        $this->preferences = $value;
        $this->_setField('preferences');
        return $this;
    }

    /**
     * @return ?value-of<CustomerCreationSource>
     */
    public function getCreationSource(): ?string
    {
        return $this->creationSource;
    }

    /**
     * @param ?value-of<CustomerCreationSource> $value
     */
    public function setCreationSource(?string $value = null): self
    {
        $this->creationSource = $value;
        $this->_setField('creationSource');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getGroupIds(): ?array
    {
        return $this->groupIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setGroupIds(?array $value = null): self
    {
        $this->groupIds = $value;
        $this->_setField('groupIds');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSegmentIds(): ?array
    {
        return $this->segmentIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSegmentIds(?array $value = null): self
    {
        $this->segmentIds = $value;
        $this->_setField('segmentIds');
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
        $this->_setField('version');
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
        $this->_setField('taxIds');
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
