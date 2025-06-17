<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BankAccountVerifiedEventObject extends JsonSerializableType
{
    /**
     * @var ?BankAccount $bankAccount The verified bank account.
     */
    #[JsonProperty('bank_account')]
    private ?BankAccount $bankAccount;

    /**
     * @param array{
     *   bankAccount?: ?BankAccount,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bankAccount = $values['bankAccount'] ?? null;
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
