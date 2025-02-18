<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a bank account. For more information about
 * linking a bank account to a Square account, see
 * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
 */
class BankAccount extends JsonSerializableType
{
    /**
     * @var string $id The unique, Square-issued identifier for the bank account.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * @var string $accountNumberSuffix The last few digits of the account number.
     */
    #[JsonProperty('account_number_suffix')]
    private string $accountNumberSuffix;

    /**
     * The ISO 3166 Alpha-2 country code where the bank account is based.
     * See [Country](#type-country) for possible values
     *
     * @var value-of<Country> $country
     */
    #[JsonProperty('country')]
    private string $country;

    /**
     * The 3-character ISO 4217 currency code indicating the operating
     * currency of the bank account. For example, the currency code for US dollars
     * is `USD`.
     * See [Currency](#type-currency) for possible values
     *
     * @var value-of<Currency> $currency
     */
    #[JsonProperty('currency')]
    private string $currency;

    /**
     * The financial purpose of the associated bank account.
     * See [BankAccountType](#type-bankaccounttype) for possible values
     *
     * @var value-of<BankAccountType> $accountType
     */
    #[JsonProperty('account_type')]
    private string $accountType;

    /**
     * Name of the account holder. This name must match the name
     * on the targeted bank account record.
     *
     * @var string $holderName
     */
    #[JsonProperty('holder_name')]
    private string $holderName;

    /**
     * Primary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     *
     * @var string $primaryBankIdentificationNumber
     */
    #[JsonProperty('primary_bank_identification_number')]
    private string $primaryBankIdentificationNumber;

    /**
     * Secondary identifier for the bank. For more information, see
     * [Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api).
     *
     * @var ?string $secondaryBankIdentificationNumber
     */
    #[JsonProperty('secondary_bank_identification_number')]
    private ?string $secondaryBankIdentificationNumber;

    /**
     * Reference identifier that will be displayed to UK bank account owners
     * when collecting direct debit authorization. Only required for UK bank accounts.
     *
     * @var ?string $debitMandateReferenceId
     */
    #[JsonProperty('debit_mandate_reference_id')]
    private ?string $debitMandateReferenceId;

    /**
     * Client-provided identifier for linking the banking account to an entity
     * in a third-party system (for example, a bank account number or a user identifier).
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @var ?string $locationId The location to which the bank account belongs.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * Read-only. The current verification status of this BankAccount object.
     * See [BankAccountStatus](#type-bankaccountstatus) for possible values
     *
     * @var value-of<BankAccountStatus> $status
     */
    #[JsonProperty('status')]
    private string $status;

    /**
     * @var bool $creditable Indicates whether it is possible for Square to send money to this bank account.
     */
    #[JsonProperty('creditable')]
    private bool $creditable;

    /**
     * Indicates whether it is possible for Square to take money from this
     * bank account.
     *
     * @var bool $debitable
     */
    #[JsonProperty('debitable')]
    private bool $debitable;

    /**
     * A Square-assigned, unique identifier for the bank account based on the
     * account information. The account fingerprint can be used to compare account
     * entries and determine if the they represent the same real-world bank account.
     *
     * @var ?string $fingerprint
     */
    #[JsonProperty('fingerprint')]
    private ?string $fingerprint;

    /**
     * @var ?int $version The current version of the `BankAccount`.
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * Read only. Name of actual financial institution.
     * For example "Bank of America".
     *
     * @var ?string $bankName
     */
    #[JsonProperty('bank_name')]
    private ?string $bankName;

    /**
     * @param array{
     *   id: string,
     *   accountNumberSuffix: string,
     *   country: value-of<Country>,
     *   currency: value-of<Currency>,
     *   accountType: value-of<BankAccountType>,
     *   holderName: string,
     *   primaryBankIdentificationNumber: string,
     *   status: value-of<BankAccountStatus>,
     *   creditable: bool,
     *   debitable: bool,
     *   secondaryBankIdentificationNumber?: ?string,
     *   debitMandateReferenceId?: ?string,
     *   referenceId?: ?string,
     *   locationId?: ?string,
     *   fingerprint?: ?string,
     *   version?: ?int,
     *   bankName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountNumberSuffix = $values['accountNumberSuffix'];
        $this->country = $values['country'];
        $this->currency = $values['currency'];
        $this->accountType = $values['accountType'];
        $this->holderName = $values['holderName'];
        $this->primaryBankIdentificationNumber = $values['primaryBankIdentificationNumber'];
        $this->secondaryBankIdentificationNumber = $values['secondaryBankIdentificationNumber'] ?? null;
        $this->debitMandateReferenceId = $values['debitMandateReferenceId'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->status = $values['status'];
        $this->creditable = $values['creditable'];
        $this->debitable = $values['debitable'];
        $this->fingerprint = $values['fingerprint'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->bankName = $values['bankName'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumberSuffix(): string
    {
        return $this->accountNumberSuffix;
    }

    /**
     * @param string $value
     */
    public function setAccountNumberSuffix(string $value): self
    {
        $this->accountNumberSuffix = $value;
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
     * @return value-of<Currency>
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param value-of<Currency> $value
     */
    public function setCurrency(string $value): self
    {
        $this->currency = $value;
        return $this;
    }

    /**
     * @return value-of<BankAccountType>
     */
    public function getAccountType(): string
    {
        return $this->accountType;
    }

    /**
     * @param value-of<BankAccountType> $value
     */
    public function setAccountType(string $value): self
    {
        $this->accountType = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHolderName(): string
    {
        return $this->holderName;
    }

    /**
     * @param string $value
     */
    public function setHolderName(string $value): self
    {
        $this->holderName = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrimaryBankIdentificationNumber(): string
    {
        return $this->primaryBankIdentificationNumber;
    }

    /**
     * @param string $value
     */
    public function setPrimaryBankIdentificationNumber(string $value): self
    {
        $this->primaryBankIdentificationNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSecondaryBankIdentificationNumber(): ?string
    {
        return $this->secondaryBankIdentificationNumber;
    }

    /**
     * @param ?string $value
     */
    public function setSecondaryBankIdentificationNumber(?string $value = null): self
    {
        $this->secondaryBankIdentificationNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDebitMandateReferenceId(): ?string
    {
        return $this->debitMandateReferenceId;
    }

    /**
     * @param ?string $value
     */
    public function setDebitMandateReferenceId(?string $value = null): self
    {
        $this->debitMandateReferenceId = $value;
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
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return value-of<BankAccountStatus>
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param value-of<BankAccountStatus> $value
     */
    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCreditable(): bool
    {
        return $this->creditable;
    }

    /**
     * @param bool $value
     */
    public function setCreditable(bool $value): self
    {
        $this->creditable = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDebitable(): bool
    {
        return $this->debitable;
    }

    /**
     * @param bool $value
     */
    public function setDebitable(bool $value): self
    {
        $this->debitable = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    /**
     * @param ?string $value
     */
    public function setFingerprint(?string $value = null): self
    {
        $this->fingerprint = $value;
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
     * @return ?string
     */
    public function getBankName(): ?string
    {
        return $this->bankName;
    }

    /**
     * @param ?string $value
     */
    public function setBankName(?string $value = null): self
    {
        $this->bankName = $value;
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
