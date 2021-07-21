<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The set of search requirements.
 */
class SearchLoyaltyRewardsRequestLoyaltyRewardQuery implements \JsonSerializable
{
    /**
     * @var string
     */
    private $loyaltyAccountId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @param string $loyaltyAccountId
     */
    public function __construct(string $loyaltyAccountId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Returns Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) to which the loyalty reward belongs.
     */
    public function getLoyaltyAccountId(): string
    {
        return $this->loyaltyAccountId;
    }

    /**
     * Sets Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) to which the loyalty reward belongs.
     *
     * @required
     * @maps loyalty_account_id
     */
    public function setLoyaltyAccountId(string $loyaltyAccountId): void
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Returns Status.
     *
     * The status of the loyalty reward.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the loyalty reward.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_account_id'] = $this->loyaltyAccountId;
        if (isset($this->status)) {
            $json['status']         = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
