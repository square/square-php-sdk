<?php

namespace Square\BankAccounts\Requests;

use Square\Core\Json\JsonSerializableType;

class DisableBankAccountRequest extends JsonSerializableType
{
    /**
     * @var string $bankAccountId The ID of the bank account to disable.
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
