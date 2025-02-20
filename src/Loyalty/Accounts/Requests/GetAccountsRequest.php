<?php

namespace Square\Loyalty\Accounts\Requests;

use Square\Core\Json\JsonSerializableType;

class GetAccountsRequest extends JsonSerializableType
{
    /**
     * @var string $accountId The ID of the [loyalty account](entity:LoyaltyAccount) to retrieve.
     */
    private string $accountId;

    /**
     * @param array{
     *   accountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
    }

    /**
     * @return string
     */
    public function getAccountId(): string
    {
        return $this->accountId;
    }

    /**
     * @param string $value
     */
    public function setAccountId(string $value): self
    {
        $this->accountId = $value;
        return $this;
    }
}
