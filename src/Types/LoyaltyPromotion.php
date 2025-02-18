<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a promotion for a [loyalty program](entity:LoyaltyProgram). Loyalty promotions enable buyers
 * to earn extra points on top of those earned from the base program.
 *
 * A loyalty program can have a maximum of 10 loyalty promotions with an `ACTIVE` or `SCHEDULED` status.
 */
class LoyaltyPromotion extends JsonSerializableType
{
    /**
     * @var ?string $id The Square-assigned ID of the promotion.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $name The name of the promotion.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * The points incentive for the promotion. This field defines whether promotion points
     * are earned by multiplying base program points or by adding a specified number of points.
     *
     * @var LoyaltyPromotionIncentive $incentive
     */
    #[JsonProperty('incentive')]
    private LoyaltyPromotionIncentive $incentive;

    /**
     * @var LoyaltyPromotionAvailableTimeData $availableTime The scheduling information that defines when purchases can qualify to earn points from an `ACTIVE` promotion.
     */
    #[JsonProperty('available_time')]
    private LoyaltyPromotionAvailableTimeData $availableTime;

    /**
     * The number of times a buyer can earn promotion points during a specified interval.
     * If not specified, buyers can trigger the promotion an unlimited number of times.
     *
     * @var ?LoyaltyPromotionTriggerLimit $triggerLimit
     */
    #[JsonProperty('trigger_limit')]
    private ?LoyaltyPromotionTriggerLimit $triggerLimit;

    /**
     * The current status of the promotion.
     * See [LoyaltyPromotionStatus](#type-loyaltypromotionstatus) for possible values
     *
     * @var ?value-of<LoyaltyPromotionStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $createdAt The timestamp of when the promotion was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $canceledAt The timestamp of when the promotion was canceled, in RFC 3339 format.
     */
    #[JsonProperty('canceled_at')]
    private ?string $canceledAt;

    /**
     * @var ?string $updatedAt The timestamp when the promotion was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $loyaltyProgramId The ID of the [loyalty program](entity:LoyaltyProgram) associated with the promotion.
     */
    #[JsonProperty('loyalty_program_id')]
    private ?string $loyaltyProgramId;

    /**
     * @var ?Money $minimumSpendAmountMoney The minimum purchase amount required to earn promotion points. If specified, this amount is positive.
     */
    #[JsonProperty('minimum_spend_amount_money')]
    private ?Money $minimumSpendAmountMoney;

    /**
     * The IDs of any qualifying `ITEM_VARIATION` [catalog objects](entity:CatalogObject). If specified,
     * the purchase must include at least one of these items to qualify for the promotion.
     *
     * This option is valid only if the base loyalty program uses a `VISIT` or `SPEND` accrual rule.
     * With `SPEND` accrual rules, make sure that qualifying promotional items are not excluded.
     *
     * You can specify `qualifying_item_variation_ids` or `qualifying_category_ids` for a given promotion, but not both.
     *
     * @var ?array<string> $qualifyingItemVariationIds
     */
    #[JsonProperty('qualifying_item_variation_ids'), ArrayType(['string'])]
    private ?array $qualifyingItemVariationIds;

    /**
     * The IDs of any qualifying `CATEGORY` [catalog objects](entity:CatalogObject). If specified,
     * the purchase must include at least one item from one of these categories to qualify for the promotion.
     *
     * This option is valid only if the base loyalty program uses a `VISIT` or `SPEND` accrual rule.
     * With `SPEND` accrual rules, make sure that qualifying promotional items are not excluded.
     *
     * You can specify `qualifying_category_ids` or `qualifying_item_variation_ids` for a promotion, but not both.
     *
     * @var ?array<string> $qualifyingCategoryIds
     */
    #[JsonProperty('qualifying_category_ids'), ArrayType(['string'])]
    private ?array $qualifyingCategoryIds;

    /**
     * @param array{
     *   name: string,
     *   incentive: LoyaltyPromotionIncentive,
     *   availableTime: LoyaltyPromotionAvailableTimeData,
     *   id?: ?string,
     *   triggerLimit?: ?LoyaltyPromotionTriggerLimit,
     *   status?: ?value-of<LoyaltyPromotionStatus>,
     *   createdAt?: ?string,
     *   canceledAt?: ?string,
     *   updatedAt?: ?string,
     *   loyaltyProgramId?: ?string,
     *   minimumSpendAmountMoney?: ?Money,
     *   qualifyingItemVariationIds?: ?array<string>,
     *   qualifyingCategoryIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'];
        $this->incentive = $values['incentive'];
        $this->availableTime = $values['availableTime'];
        $this->triggerLimit = $values['triggerLimit'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->loyaltyProgramId = $values['loyaltyProgramId'] ?? null;
        $this->minimumSpendAmountMoney = $values['minimumSpendAmountMoney'] ?? null;
        $this->qualifyingItemVariationIds = $values['qualifyingItemVariationIds'] ?? null;
        $this->qualifyingCategoryIds = $values['qualifyingCategoryIds'] ?? null;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return LoyaltyPromotionIncentive
     */
    public function getIncentive(): LoyaltyPromotionIncentive
    {
        return $this->incentive;
    }

    /**
     * @param LoyaltyPromotionIncentive $value
     */
    public function setIncentive(LoyaltyPromotionIncentive $value): self
    {
        $this->incentive = $value;
        return $this;
    }

    /**
     * @return LoyaltyPromotionAvailableTimeData
     */
    public function getAvailableTime(): LoyaltyPromotionAvailableTimeData
    {
        return $this->availableTime;
    }

    /**
     * @param LoyaltyPromotionAvailableTimeData $value
     */
    public function setAvailableTime(LoyaltyPromotionAvailableTimeData $value): self
    {
        $this->availableTime = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyPromotionTriggerLimit
     */
    public function getTriggerLimit(): ?LoyaltyPromotionTriggerLimit
    {
        return $this->triggerLimit;
    }

    /**
     * @param ?LoyaltyPromotionTriggerLimit $value
     */
    public function setTriggerLimit(?LoyaltyPromotionTriggerLimit $value = null): self
    {
        $this->triggerLimit = $value;
        return $this;
    }

    /**
     * @return ?value-of<LoyaltyPromotionStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<LoyaltyPromotionStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
    public function getCanceledAt(): ?string
    {
        return $this->canceledAt;
    }

    /**
     * @param ?string $value
     */
    public function setCanceledAt(?string $value = null): self
    {
        $this->canceledAt = $value;
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
     * @return ?string
     */
    public function getLoyaltyProgramId(): ?string
    {
        return $this->loyaltyProgramId;
    }

    /**
     * @param ?string $value
     */
    public function setLoyaltyProgramId(?string $value = null): self
    {
        $this->loyaltyProgramId = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getMinimumSpendAmountMoney(): ?Money
    {
        return $this->minimumSpendAmountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setMinimumSpendAmountMoney(?Money $value = null): self
    {
        $this->minimumSpendAmountMoney = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getQualifyingItemVariationIds(): ?array
    {
        return $this->qualifyingItemVariationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setQualifyingItemVariationIds(?array $value = null): self
    {
        $this->qualifyingItemVariationIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getQualifyingCategoryIds(): ?array
    {
        return $this->qualifyingCategoryIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setQualifyingCategoryIds(?array $value = null): self
    {
        $this->qualifyingCategoryIds = $value;
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
