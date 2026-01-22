<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Response object returned by ListBankAccounts.
 */
class ListBankAccountsResponse extends JsonSerializableType
{
    /**
     * @var ?array<BankAccount> $bankAccounts List of BankAccounts associated with this account.
     */
    #[JsonProperty('bank_accounts'), ArrayType([BankAccount::class])]
    private ?array $bankAccounts;

    /**
     * @var ?array<Error> $errors Information on errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * When a response is truncated, it includes a cursor that you can
     * use in a subsequent request to fetch next set of bank accounts.
     * If empty, this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   bankAccounts?: ?array<BankAccount>,
     *   errors?: ?array<Error>,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bankAccounts = $values['bankAccounts'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?array<BankAccount>
     */
    public function getBankAccounts(): ?array
    {
        return $this->bankAccounts;
    }

    /**
     * @param ?array<BankAccount> $value
     */
    public function setBankAccounts(?array $value = null): self
    {
        $this->bankAccounts = $value;
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
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
