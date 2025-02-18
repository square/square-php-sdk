<?php

namespace Square\BankAccounts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetByV1IdBankAccountsRequest extends JsonSerializableType
{
    /**
     * Connect V1 ID of the desired `BankAccount`. For more information, see
     * [Retrieve a bank account by using an ID issued by V1 Bank Accounts API](https://developer.squareup.com/docs/bank-accounts-api#retrieve-a-bank-account-by-using-an-id-issued-by-v1-bank-accounts-api).
     *
     * @var string $v1BankAccountId
     */
    private string $v1BankAccountId;

    /**
     * @param array{
     *   v1BankAccountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->v1BankAccountId = $values['v1BankAccountId'];
    }

    /**
     * @return string
     */
    public function getV1BankAccountId(): string
    {
        return $this->v1BankAccountId;
    }

    /**
     * @param string $value
     */
    public function setV1BankAccountId(string $value): self
    {
        $this->v1BankAccountId = $value;
        return $this;
    }
}
