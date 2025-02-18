<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a Square loyalty program. Loyalty programs define how buyers can earn points and redeem points for rewards.
 * Square sellers can have only one loyalty program, which is created and managed from the Seller Dashboard.
 * For more information, see [Loyalty Program Overview](https://developer.squareup.com/docs/loyalty/overview).
 */
class LoyaltyProgram extends JsonSerializableType
{
    /**
     * The Square-assigned ID of the loyalty program. Updates to
     * the loyalty program do not modify the identifier.
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * Whether the program is currently active.
     * See [LoyaltyProgramStatus](#type-loyaltyprogramstatus) for possible values
     *
     * @var ?value-of<LoyaltyProgramStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?array<LoyaltyProgramRewardTier> $rewardTiers The list of rewards for buyers, sorted by ascending points.
     */
    #[JsonProperty('reward_tiers'), ArrayType([LoyaltyProgramRewardTier::class])]
    private ?array $rewardTiers;

    /**
     * @var ?LoyaltyProgramExpirationPolicy $expirationPolicy If present, details for how points expire.
     */
    #[JsonProperty('expiration_policy')]
    private ?LoyaltyProgramExpirationPolicy $expirationPolicy;

    /**
     * @var ?LoyaltyProgramTerminology $terminology A cosmetic name for the “points” currency.
     */
    #[JsonProperty('terminology')]
    private ?LoyaltyProgramTerminology $terminology;

    /**
     * @var ?array<string> $locationIds The [locations](entity:Location) at which the program is active.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * @var ?string $createdAt The timestamp when the program was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the reward was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * Defines how buyers can earn loyalty points from the base loyalty program.
     * To check for associated [loyalty promotions](entity:LoyaltyPromotion) that enable
     * buyers to earn extra points, call [ListLoyaltyPromotions](api-endpoint:Loyalty-ListLoyaltyPromotions).
     *
     * @var ?array<LoyaltyProgramAccrualRule> $accrualRules
     */
    #[JsonProperty('accrual_rules'), ArrayType([LoyaltyProgramAccrualRule::class])]
    private ?array $accrualRules;

    /**
     * @param array{
     *   id?: ?string,
     *   status?: ?value-of<LoyaltyProgramStatus>,
     *   rewardTiers?: ?array<LoyaltyProgramRewardTier>,
     *   expirationPolicy?: ?LoyaltyProgramExpirationPolicy,
     *   terminology?: ?LoyaltyProgramTerminology,
     *   locationIds?: ?array<string>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   accrualRules?: ?array<LoyaltyProgramAccrualRule>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->rewardTiers = $values['rewardTiers'] ?? null;
        $this->expirationPolicy = $values['expirationPolicy'] ?? null;
        $this->terminology = $values['terminology'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->accrualRules = $values['accrualRules'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?value-of<LoyaltyProgramStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LoyaltyProgramStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?array<LoyaltyProgramRewardTier>
     */
    public function getRewardTiers(): ?array
    {
        return $this->rewardTiers;
    }

    /**
     * @param ?array<LoyaltyProgramRewardTier> $value
     */
    public function setRewardTiers(?array $value = null): self
    {
        $this->rewardTiers = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramExpirationPolicy
     */
    public function getExpirationPolicy(): ?LoyaltyProgramExpirationPolicy
    {
        return $this->expirationPolicy;
    }

    /**
     * @param ?LoyaltyProgramExpirationPolicy $value
     */
    public function setExpirationPolicy(?LoyaltyProgramExpirationPolicy $value = null): self
    {
        $this->expirationPolicy = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyProgramTerminology
     */
    public function getTerminology(): ?LoyaltyProgramTerminology
    {
        return $this->terminology;
    }

    /**
     * @param ?LoyaltyProgramTerminology $value
     */
    public function setTerminology(?LoyaltyProgramTerminology $value = null): self
    {
        $this->terminology = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?array<LoyaltyProgramAccrualRule>
     */
    public function getAccrualRules(): ?array
    {
        return $this->accrualRules;
    }

    /**
     * @param ?array<LoyaltyProgramAccrualRule> $value
     */
    public function setAccrualRules(?array $value = null): self
    {
        $this->accrualRules = $value;
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
