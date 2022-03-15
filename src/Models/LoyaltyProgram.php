<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a Square loyalty program. Loyalty programs define how buyers can earn points and redeem
 * points for rewards.
 * Square sellers can have only one loyalty program, which is created and managed from the Seller
 * Dashboard.
 * For more information, see [Loyalty Program Overview](https://developer.squareup.
 * com/docs/loyalty/overview).
 */
class LoyaltyProgram implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $status;

    /**
     * @var LoyaltyProgramRewardTier[]
     */
    private $rewardTiers;

    /**
     * @var LoyaltyProgramExpirationPolicy|null
     */
    private $expirationPolicy;

    /**
     * @var LoyaltyProgramTerminology
     */
    private $terminology;

    /**
     * @var string[]
     */
    private $locationIds;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var LoyaltyProgramAccrualRule[]
     */
    private $accrualRules;

    /**
     * @param string $id
     * @param string $status
     * @param LoyaltyProgramRewardTier[] $rewardTiers
     * @param LoyaltyProgramTerminology $terminology
     * @param string[] $locationIds
     * @param string $createdAt
     * @param string $updatedAt
     * @param LoyaltyProgramAccrualRule[] $accrualRules
     */
    public function __construct(
        string $id,
        string $status,
        array $rewardTiers,
        LoyaltyProgramTerminology $terminology,
        array $locationIds,
        string $createdAt,
        string $updatedAt,
        array $accrualRules
    ) {
        $this->id = $id;
        $this->status = $status;
        $this->rewardTiers = $rewardTiers;
        $this->terminology = $terminology;
        $this->locationIds = $locationIds;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->accrualRules = $accrualRules;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the loyalty program. Updates to
     * the loyalty program do not modify the identifier.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the loyalty program. Updates to
     * the loyalty program do not modify the identifier.
     *
     * @required
     * @maps id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Status.
     *
     * Indicates whether the program is currently active.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates whether the program is currently active.
     *
     * @required
     * @maps status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Reward Tiers.
     *
     * The list of rewards for buyers, sorted by ascending points.
     *
     * @return LoyaltyProgramRewardTier[]
     */
    public function getRewardTiers(): array
    {
        return $this->rewardTiers;
    }

    /**
     * Sets Reward Tiers.
     *
     * The list of rewards for buyers, sorted by ascending points.
     *
     * @required
     * @maps reward_tiers
     *
     * @param LoyaltyProgramRewardTier[] $rewardTiers
     */
    public function setRewardTiers(array $rewardTiers): void
    {
        $this->rewardTiers = $rewardTiers;
    }

    /**
     * Returns Expiration Policy.
     *
     * Describes when the loyalty program expires.
     */
    public function getExpirationPolicy(): ?LoyaltyProgramExpirationPolicy
    {
        return $this->expirationPolicy;
    }

    /**
     * Sets Expiration Policy.
     *
     * Describes when the loyalty program expires.
     *
     * @maps expiration_policy
     */
    public function setExpirationPolicy(?LoyaltyProgramExpirationPolicy $expirationPolicy): void
    {
        $this->expirationPolicy = $expirationPolicy;
    }

    /**
     * Returns Terminology.
     *
     * Represents the naming used for loyalty points.
     */
    public function getTerminology(): LoyaltyProgramTerminology
    {
        return $this->terminology;
    }

    /**
     * Sets Terminology.
     *
     * Represents the naming used for loyalty points.
     *
     * @required
     * @maps terminology
     */
    public function setTerminology(LoyaltyProgramTerminology $terminology): void
    {
        $this->terminology = $terminology;
    }

    /**
     * Returns Location Ids.
     *
     * The [locations]($m/Location) at which the program is active.
     *
     * @return string[]
     */
    public function getLocationIds(): array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * The [locations]($m/Location) at which the program is active.
     *
     * @required
     * @maps location_ids
     *
     * @param string[] $locationIds
     */
    public function setLocationIds(array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the program was created, in RFC 3339 format.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the program was created, in RFC 3339 format.
     *
     * @required
     * @maps created_at
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp when the reward was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp when the reward was last updated, in RFC 3339 format.
     *
     * @required
     * @maps updated_at
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Accrual Rules.
     *
     * Defines how buyers can earn loyalty points.
     *
     * @return LoyaltyProgramAccrualRule[]
     */
    public function getAccrualRules(): array
    {
        return $this->accrualRules;
    }

    /**
     * Sets Accrual Rules.
     *
     * Defines how buyers can earn loyalty points.
     *
     * @required
     * @maps accrual_rules
     *
     * @param LoyaltyProgramAccrualRule[] $accrualRules
     */
    public function setAccrualRules(array $accrualRules): void
    {
        $this->accrualRules = $accrualRules;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['id']                    = $this->id;
        $json['status']                = $this->status;
        $json['reward_tiers']          = $this->rewardTiers;
        if (isset($this->expirationPolicy)) {
            $json['expiration_policy'] = $this->expirationPolicy;
        }
        $json['terminology']           = $this->terminology;
        $json['location_ids']          = $this->locationIds;
        $json['created_at']            = $this->createdAt;
        $json['updated_at']            = $this->updatedAt;
        $json['accrual_rules']         = $this->accrualRules;
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
