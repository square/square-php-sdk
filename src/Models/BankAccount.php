<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a bank account. For more information about
 * linking a bank account to a Square account, see
 * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
 */
class BankAccount implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $accountNumberSuffix;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $accountType;

    /**
     * @var string
     */
    private $holderName;

    /**
     * @var string
     */
    private $primaryBankIdentificationNumber;

    /**
     * @var string|null
     */
    private $secondaryBankIdentificationNumber;

    /**
     * @var string|null
     */
    private $debitMandateReferenceId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var bool
     */
    private $creditable;

    /**
     * @var bool
     */
    private $debitable;

    /**
     * @var string|null
     */
    private $fingerprint;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $bankName;

    /**
     * @param string $id
     * @param string $accountNumberSuffix
     * @param string $country
     * @param string $currency
     * @param string $accountType
     * @param string $holderName
     * @param string $primaryBankIdentificationNumber
     * @param string $status
     * @param bool $creditable
     * @param bool $debitable
     */
    public function __construct(
        string $id,
        string $accountNumberSuffix,
        string $country,
        string $currency,
        string $accountType,
        string $holderName,
        string $primaryBankIdentificationNumber,
        string $status,
        bool $creditable,
        bool $debitable
    ) {
        $this->id = $id;
        $this->accountNumberSuffix = $accountNumberSuffix;
        $this->country = $country;
        $this->currency = $currency;
        $this->accountType = $accountType;
        $this->holderName = $holderName;
        $this->primaryBankIdentificationNumber = $primaryBankIdentificationNumber;
        $this->status = $status;
        $this->creditable = $creditable;
        $this->debitable = $debitable;
    }

    /**
     * Returns Id.
     *
     * The unique, Square-issued identifier for the bank account.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The unique, Square-issued identifier for the bank account.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Account Number Suffix.
     *
     * The last few digits of the account number.
     */
    public function getAccountNumberSuffix(): string
    {
        return $this->accountNumberSuffix;
    }

    /**
     * Sets Account Number Suffix.
     *
     * The last few digits of the account number.
     *
     * @required
     * @maps account_number_suffix
     */
    public function setAccountNumberSuffix(string $accountNumberSuffix): void
    {
        $this->accountNumberSuffix = $accountNumberSuffix;
    }

    /**
     * Returns Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     *
     * @required
     * @maps country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * Returns Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Sets Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     *
     * @required
     * @maps currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Returns Account Type.
     *
     * Indicates the financial purpose of the bank account.
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * Sets Account Type.
     *
     * Indicates the financial purpose of the bank account.
     *
     * @required
     * @maps account_type
     */
    public function setAccountType(string $accountType): void
    {
        $this->accountType = $accountType;
    }

    /**
     * Returns Holder Name.
     *
     * Name of the account holder. This name must match the name
     * on the targeted bank account record.
     */
    public function getHolderName(): string
    {
        return $this->holderName;
    }

    /**
     * Sets Holder Name.
     *
     * Name of the account holder. This name must match the name
     * on the targeted bank account record.
     *
     * @required
     * @maps holder_name
     */
    public function setHolderName(string $holderName): void
    {
        $this->holderName = $holderName;
    }

    /**
     * Returns Primary Bank Identification Number.
     *
     * Primary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     */
    public function getPrimaryBankIdentificationNumber(): string
    {
        return $this->primaryBankIdentificationNumber;
    }

    /**
     * Sets Primary Bank Identification Number.
     *
     * Primary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     *
     * @required
     * @maps primary_bank_identification_number
     */
    public function setPrimaryBankIdentificationNumber(string $primaryBankIdentificationNumber): void
    {
        $this->primaryBankIdentificationNumber = $primaryBankIdentificationNumber;
    }

    /**
     * Returns Secondary Bank Identification Number.
     *
     * Secondary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     */
    public function getSecondaryBankIdentificationNumber(): ?string
    {
        return $this->secondaryBankIdentificationNumber;
    }

    /**
     * Sets Secondary Bank Identification Number.
     *
     * Secondary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     *
     * @maps secondary_bank_identification_number
     */
    public function setSecondaryBankIdentificationNumber(?string $secondaryBankIdentificationNumber): void
    {
        $this->secondaryBankIdentificationNumber = $secondaryBankIdentificationNumber;
    }

    /**
     * Returns Debit Mandate Reference Id.
     *
     * Reference identifier that will be displayed to UK bank account owners
     * when collecting direct debit authorization. Only required for UK bank accounts.
     */
    public function getDebitMandateReferenceId(): ?string
    {
        return $this->debitMandateReferenceId;
    }

    /**
     * Sets Debit Mandate Reference Id.
     *
     * Reference identifier that will be displayed to UK bank account owners
     * when collecting direct debit authorization. Only required for UK bank accounts.
     *
     * @maps debit_mandate_reference_id
     */
    public function setDebitMandateReferenceId(?string $debitMandateReferenceId): void
    {
        $this->debitMandateReferenceId = $debitMandateReferenceId;
    }

    /**
     * Returns Reference Id.
     *
     * Client-provided identifier for linking the banking account to an entity
     * in a third-party system (for example, a bank account number or a user identifier).
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * Client-provided identifier for linking the banking account to an entity
     * in a third-party system (for example, a bank account number or a user identifier).
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Location Id.
     *
     * The location to which the bank account belongs.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location to which the bank account belongs.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Status.
     *
     * Indicates the current verification status of a `BankAccount` object.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates the current verification status of a `BankAccount` object.
     *
     * @required
     * @maps status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Creditable.
     *
     * Indicates whether it is possible for Square to send money to this bank account.
     */
    public function getCreditable(): bool
    {
        return $this->creditable;
    }

    /**
     * Sets Creditable.
     *
     * Indicates whether it is possible for Square to send money to this bank account.
     *
     * @required
     * @maps creditable
     */
    public function setCreditable(bool $creditable): void
    {
        $this->creditable = $creditable;
    }

    /**
     * Returns Debitable.
     *
     * Indicates whether it is possible for Square to take money from this
     * bank account.
     */
    public function getDebitable(): bool
    {
        return $this->debitable;
    }

    /**
     * Sets Debitable.
     *
     * Indicates whether it is possible for Square to take money from this
     * bank account.
     *
     * @required
     * @maps debitable
     */
    public function setDebitable(bool $debitable): void
    {
        $this->debitable = $debitable;
    }

    /**
     * Returns Fingerprint.
     *
     * A Square-assigned, unique identifier for the bank account based on the
     * account information. The account fingerprint can be used to compare account
     * entries and determine if the they represent the same real-world bank account.
     */
    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    /**
     * Sets Fingerprint.
     *
     * A Square-assigned, unique identifier for the bank account based on the
     * account information. The account fingerprint can be used to compare account
     * entries and determine if the they represent the same real-world bank account.
     *
     * @maps fingerprint
     */
    public function setFingerprint(?string $fingerprint): void
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * Returns Version.
     *
     * The current version of the `BankAccount`.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The current version of the `BankAccount`.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Bank Name.
     *
     * Read only. Name of actual financial institution.
     * For example "Bank of America".
     */
    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    /**
     * Sets Bank Name.
     *
     * Read only. Name of actual financial institution.
     * For example "Bank of America".
     *
     * @maps bank_name
     */
    public function setBankName(?string $bankName): void
    {
        $this->bankName = $bankName;
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
        $json['id']                                       = $this->id;
        $json['account_number_suffix']                    = $this->accountNumberSuffix;
        $json['country']                                  = $this->country;
        $json['currency']                                 = $this->currency;
        $json['account_type']                             = $this->accountType;
        $json['holder_name']                              = $this->holderName;
        $json['primary_bank_identification_number']       = $this->primaryBankIdentificationNumber;
        if (isset($this->secondaryBankIdentificationNumber)) {
            $json['secondary_bank_identification_number'] = $this->secondaryBankIdentificationNumber;
        }
        if (isset($this->debitMandateReferenceId)) {
            $json['debit_mandate_reference_id']           = $this->debitMandateReferenceId;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']                         = $this->referenceId;
        }
        if (isset($this->locationId)) {
            $json['location_id']                          = $this->locationId;
        }
        $json['status']                                   = $this->status;
        $json['creditable']                               = $this->creditable;
        $json['debitable']                                = $this->debitable;
        if (isset($this->fingerprint)) {
            $json['fingerprint']                          = $this->fingerprint;
        }
        if (isset($this->version)) {
            $json['version']                              = $this->version;
        }
        if (isset($this->bankName)) {
            $json['bank_name']                            = $this->bankName;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
