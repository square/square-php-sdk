<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the body parameters that can be provided in a request to the
 * CreateCustomer endpoint.
 */
class CreateCustomerRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

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
     * Returns Idempotency Key.
     *
     * The idempotency key for the request. See the
     * [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) guide for more
     * information.
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * The idempotency key for the request. See the
     * [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency) guide for more
     * information.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Given Name.
     *
     * The given (i.e., first) name associated with the customer profile.
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The given (i.e., first) name associated with the customer profile.
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
     * The family (i.e., last) name associated with the customer profile.
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The family (i.e., last) name associated with the customer profile.
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
     * Represents a physical address.
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a physical address.
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
     * An optional, second ID used to associate the customer profile with an
     * entity in another system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional, second ID used to associate the customer profile with an
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
     * The birthday associated with the customer profile, in RFC 3339 format.
     * Year is optional, timezone and times are not allowed.
     * For example: `0000-09-01T00:00:00-00:00` indicates a birthday on September 1st.
     * `1998-09-01T00:00:00-00:00` indications a birthday on September 1st __1998__.
     */
    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    /**
     * Sets Birthday.
     *
     * The birthday associated with the customer profile, in RFC 3339 format.
     * Year is optional, timezone and times are not allowed.
     * For example: `0000-09-01T00:00:00-00:00` indicates a birthday on September 1st.
     * `1998-09-01T00:00:00-00:00` indications a birthday on September 1st __1998__.
     *
     * @maps birthday
     */
    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['given_name']     = $this->givenName;
        $json['family_name']    = $this->familyName;
        $json['company_name']   = $this->companyName;
        $json['nickname']       = $this->nickname;
        $json['email_address']  = $this->emailAddress;
        $json['address']        = $this->address;
        $json['phone_number']   = $this->phoneNumber;
        $json['reference_id']   = $this->referenceId;
        $json['note']           = $this->note;
        $json['birthday']       = $this->birthday;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
