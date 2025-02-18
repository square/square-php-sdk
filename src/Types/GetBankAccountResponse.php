<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response object returned by `GetBankAccount`.
 */
class GetBankAccountResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?BankAccount $bankAccount The requested `BankAccount` object.
     */
    #[JsonProperty('bank_account')]
    private ?BankAccount $bankAccount;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   bankAccount?: ?BankAccount,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->bankAccount = $values['bankAccount'] ?? null;
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
     * @return ?BankAccount
     */
    public function getBankAccount(): ?BankAccount
    {
        return $this->bankAccount;
    }

    /**
     * @param ?BankAccount $value
     */
    public function setBankAccount(?BankAccount $value = null): self
    {
        $this->bankAccount = $value;
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
