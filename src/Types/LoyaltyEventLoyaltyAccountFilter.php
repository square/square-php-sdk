<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Filter events by loyalty account.
 */
class LoyaltyEventLoyaltyAccountFilter extends JsonSerializableType
{
    /**
     * @var string $loyaltyAccountId The ID of the [loyalty account](entity:LoyaltyAccount) associated with loyalty events.
     */
    #[JsonProperty('loyalty_account_id')]
    private string $loyaltyAccountId;

    /**
     * @param array{
     *   loyaltyAccountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loyaltyAccountId = $values['loyaltyAccountId'];
    }

    /**
     * @return string
     */
    public function getLoyaltyAccountId(): string
    {
        return $this->loyaltyAccountId;
    }

    /**
     * @param string $value
     */
    public function setLoyaltyAccountId(string $value): self
    {
        $this->loyaltyAccountId = $value;
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
