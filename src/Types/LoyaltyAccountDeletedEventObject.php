<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LoyaltyAccountDeletedEventObject extends JsonSerializableType
{
    /**
     * @var ?LoyaltyAccount $loyaltyAccount The loyalty account that was deleted.
     */
    #[JsonProperty('loyalty_account')]
    private ?LoyaltyAccount $loyaltyAccount;

    /**
     * @param array{
     *   loyaltyAccount?: ?LoyaltyAccount,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyAccount = $values['loyaltyAccount'] ?? null;
    }

    /**
     * @return ?LoyaltyAccount
     */
    public function getLoyaltyAccount(): ?LoyaltyAccount
    {
        return $this->loyaltyAccount;
    }

    /**
     * @param ?LoyaltyAccount $value
     */
    public function setLoyaltyAccount(?LoyaltyAccount $value = null): self
    {
        $this->loyaltyAccount = $value;
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
