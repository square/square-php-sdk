<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The set of search requirements.
 */
class SearchLoyaltyRewardsRequestLoyaltyRewardQuery extends JsonSerializableType
{
    /**
     * @var string $loyaltyAccountId The ID of the [loyalty account](entity:LoyaltyAccount) to which the loyalty reward belongs.
     */
    #[JsonProperty('loyalty_account_id')]
    private string $loyaltyAccountId;

    /**
     * The status of the loyalty reward.
     * See [LoyaltyRewardStatus](#type-loyaltyrewardstatus) for possible values
     *
     * @var ?value-of<LoyaltyRewardStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   loyaltyAccountId: string,
     *   status?: ?value-of<LoyaltyRewardStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->loyaltyAccountId = $values['loyaltyAccountId'];
        $this->status = $values['status'] ?? null;
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
     * @return ?value-of<LoyaltyRewardStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LoyaltyRewardStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
