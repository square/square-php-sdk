<?php

namespace Square\Loyalty\Accounts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyAccount;
use Square\Core\Json\JsonProperty;

class CreateLoyaltyAccountRequest extends JsonSerializableType
{
    /**
     * @var LoyaltyAccount $loyaltyAccount The loyalty account to create.
     */
    #[JsonProperty('loyalty_account')]
    private LoyaltyAccount $loyaltyAccount;

    /**
     * A unique string that identifies this `CreateLoyaltyAccount` request.
     * Keys can be any valid string, but must be unique for every request.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   loyaltyAccount: LoyaltyAccount,
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loyaltyAccount = $values['loyaltyAccount'];
        $this->idempotencyKey = $values['idempotencyKey'];
    }

    /**
     * @return LoyaltyAccount
     */
    public function getLoyaltyAccount(): LoyaltyAccount
    {
        return $this->loyaltyAccount;
    }

    /**
     * @param LoyaltyAccount $value
     */
    public function setLoyaltyAccount(LoyaltyAccount $value): self
    {
        $this->loyaltyAccount = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }
}
