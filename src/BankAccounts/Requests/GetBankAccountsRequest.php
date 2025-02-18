<?php

namespace Square\BankAccounts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetBankAccountsRequest extends JsonSerializableType
{
    /**
     * @var string $bankAccountId Square-issued ID of the desired `BankAccount`.
     */
    private string $bankAccountId;

    /**
     * @param array{
     *   bankAccountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bankAccountId = $values['bankAccountId'];
    }

    /**
     * @return string
     */
    public function getBankAccountId(): string
    {
        return $this->bankAccountId;
    }

    /**
     * @param string $value
     */
    public function setBankAccountId(string $value): self
    {
        $this->bankAccountId = $value;
        return $this;
    }
}
