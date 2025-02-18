<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Additional details about BANK_ACCOUNT type payments.
 */
class BankAccountPaymentDetails extends JsonSerializableType
{
    /**
     * @var ?string $bankName The name of the bank associated with the bank account.
     */
    #[JsonProperty('bank_name')]
    private ?string $bankName;

    /**
     * @var ?string $transferType The type of the bank transfer. The type can be `ACH` or `UNKNOWN`.
     */
    #[JsonProperty('transfer_type')]
    private ?string $transferType;

    /**
     * The ownership type of the bank account performing the transfer.
     * The type can be `INDIVIDUAL`, `COMPANY`, or `ACCOUNT_TYPE_UNKNOWN`.
     *
     * @var ?string $accountOwnershipType
     */
    #[JsonProperty('account_ownership_type')]
    private ?string $accountOwnershipType;

    /**
     * Uniquely identifies the bank account for this seller and can be used
     * to determine if payments are from the same bank account.
     *
     * @var ?string $fingerprint
     */
    #[JsonProperty('fingerprint')]
    private ?string $fingerprint;

    /**
     * @var ?string $country The two-letter ISO code representing the country the bank account is located in.
     */
    #[JsonProperty('country')]
    private ?string $country;

    /**
     * @var ?string $statementDescription The statement description as sent to the bank.
     */
    #[JsonProperty('statement_description')]
    private ?string $statementDescription;

    /**
     * ACH-specific information about the transfer. The information is only populated
     * if the `transfer_type` is `ACH`.
     *
     * @var ?AchDetails $achDetails
     */
    #[JsonProperty('ach_details')]
    private ?AchDetails $achDetails;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   bankName?: ?string,
     *   transferType?: ?string,
     *   accountOwnershipType?: ?string,
     *   fingerprint?: ?string,
     *   country?: ?string,
     *   statementDescription?: ?string,
     *   achDetails?: ?AchDetails,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bankName = $values['bankName'] ?? null;
        $this->transferType = $values['transferType'] ?? null;
        $this->accountOwnershipType = $values['accountOwnershipType'] ?? null;
        $this->fingerprint = $values['fingerprint'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->statementDescription = $values['statementDescription'] ?? null;
        $this->achDetails = $values['achDetails'] ?? null;
        $this->errors = $values['errors'] ?? null;
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
     * @return ?string
     */
    public function getTransferType(): ?string
    {
        return $this->transferType;
    }

    /**
     * @param ?string $value
     */
    public function setTransferType(?string $value = null): self
    {
        $this->transferType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAccountOwnershipType(): ?string
    {
        return $this->accountOwnershipType;
    }

    /**
     * @param ?string $value
     */
    public function setAccountOwnershipType(?string $value = null): self
    {
        $this->accountOwnershipType = $value;
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
     * @return ?string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param ?string $value
     */
    public function setCountry(?string $value = null): self
    {
        $this->country = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatementDescription(): ?string
    {
        return $this->statementDescription;
    }

    /**
     * @param ?string $value
     */
    public function setStatementDescription(?string $value = null): self
    {
        $this->statementDescription = $value;
        return $this;
    }

    /**
     * @return ?AchDetails
     */
    public function getAchDetails(): ?AchDetails
    {
        return $this->achDetails;
    }

    /**
     * @param ?AchDetails $value
     */
    public function setAchDetails(?AchDetails $value = null): self
    {
        $this->achDetails = $value;
        return $this;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
