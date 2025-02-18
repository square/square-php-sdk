<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides information about a loyalty event.
 * For more information, see [Search for Balance-Changing Loyalty Events](https://developer.squareup.com/docs/loyalty-api/loyalty-events).
 */
class LoyaltyEvent extends JsonSerializableType
{
    /**
     * @var string $id The Square-assigned ID of the loyalty event.
     */
    #[JsonProperty('id')]
    private string $id;

    /**
     * The type of the loyalty event.
     * See [LoyaltyEventType](#type-loyaltyeventtype) for possible values
     *
     * @var value-of<LoyaltyEventType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var string $createdAt The timestamp when the event was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private string $createdAt;

    /**
     * @var ?LoyaltyEventAccumulatePoints $accumulatePoints Provides metadata when the event `type` is `ACCUMULATE_POINTS`.
     */
    #[JsonProperty('accumulate_points')]
    private ?LoyaltyEventAccumulatePoints $accumulatePoints;

    /**
     * @var ?LoyaltyEventCreateReward $createReward Provides metadata when the event `type` is `CREATE_REWARD`.
     */
    #[JsonProperty('create_reward')]
    private ?LoyaltyEventCreateReward $createReward;

    /**
     * @var ?LoyaltyEventRedeemReward $redeemReward Provides metadata when the event `type` is `REDEEM_REWARD`.
     */
    #[JsonProperty('redeem_reward')]
    private ?LoyaltyEventRedeemReward $redeemReward;

    /**
     * @var ?LoyaltyEventDeleteReward $deleteReward Provides metadata when the event `type` is `DELETE_REWARD`.
     */
    #[JsonProperty('delete_reward')]
    private ?LoyaltyEventDeleteReward $deleteReward;

    /**
     * @var ?LoyaltyEventAdjustPoints $adjustPoints Provides metadata when the event `type` is `ADJUST_POINTS`.
     */
    #[JsonProperty('adjust_points')]
    private ?LoyaltyEventAdjustPoints $adjustPoints;

    /**
     * @var string $loyaltyAccountId The ID of the [loyalty account](entity:LoyaltyAccount) associated with the event.
     */
    #[JsonProperty('loyalty_account_id')]
    private string $loyaltyAccountId;

    /**
     * @var ?string $locationId The ID of the [location](entity:Location) where the event occurred.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * Defines whether the event was generated by the Square Point of Sale.
     * See [LoyaltyEventSource](#type-loyaltyeventsource) for possible values
     *
     * @var value-of<LoyaltyEventSource> $source
     */
    #[JsonProperty('source')]
    private string $source;

    /**
     * @var ?LoyaltyEventExpirePoints $expirePoints Provides metadata when the event `type` is `EXPIRE_POINTS`.
     */
    #[JsonProperty('expire_points')]
    private ?LoyaltyEventExpirePoints $expirePoints;

    /**
     * @var ?LoyaltyEventOther $otherEvent Provides metadata when the event `type` is `OTHER`.
     */
    #[JsonProperty('other_event')]
    private ?LoyaltyEventOther $otherEvent;

    /**
     * @var ?LoyaltyEventAccumulatePromotionPoints $accumulatePromotionPoints Provides metadata when the event `type` is `ACCUMULATE_PROMOTION_POINTS`.
     */
    #[JsonProperty('accumulate_promotion_points')]
    private ?LoyaltyEventAccumulatePromotionPoints $accumulatePromotionPoints;

    /**
     * @param array{
     *   id: string,
     *   type: value-of<LoyaltyEventType>,
     *   createdAt: string,
     *   loyaltyAccountId: string,
     *   source: value-of<LoyaltyEventSource>,
     *   accumulatePoints?: ?LoyaltyEventAccumulatePoints,
     *   createReward?: ?LoyaltyEventCreateReward,
     *   redeemReward?: ?LoyaltyEventRedeemReward,
     *   deleteReward?: ?LoyaltyEventDeleteReward,
     *   adjustPoints?: ?LoyaltyEventAdjustPoints,
     *   locationId?: ?string,
     *   expirePoints?: ?LoyaltyEventExpirePoints,
     *   otherEvent?: ?LoyaltyEventOther,
     *   accumulatePromotionPoints?: ?LoyaltyEventAccumulatePromotionPoints,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->type = $values['type'];
        $this->createdAt = $values['createdAt'];
        $this->accumulatePoints = $values['accumulatePoints'] ?? null;
        $this->createReward = $values['createReward'] ?? null;
        $this->redeemReward = $values['redeemReward'] ?? null;
        $this->deleteReward = $values['deleteReward'] ?? null;
        $this->adjustPoints = $values['adjustPoints'] ?? null;
        $this->loyaltyAccountId = $values['loyaltyAccountId'];
        $this->locationId = $values['locationId'] ?? null;
        $this->source = $values['source'];
        $this->expirePoints = $values['expirePoints'] ?? null;
        $this->otherEvent = $values['otherEvent'] ?? null;
        $this->accumulatePromotionPoints = $values['accumulatePromotionPoints'] ?? null;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $value
     */
    public function setId(string $value): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return value-of<LoyaltyEventType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<LoyaltyEventType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $value
     */
    public function setCreatedAt(string $value): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventAccumulatePoints
     */
    public function getAccumulatePoints(): ?LoyaltyEventAccumulatePoints
    {
        return $this->accumulatePoints;
    }

    /**
     * @param ?LoyaltyEventAccumulatePoints $value
     */
    public function setAccumulatePoints(?LoyaltyEventAccumulatePoints $value = null): self
    {
        $this->accumulatePoints = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventCreateReward
     */
    public function getCreateReward(): ?LoyaltyEventCreateReward
    {
        return $this->createReward;
    }

    /**
     * @param ?LoyaltyEventCreateReward $value
     */
    public function setCreateReward(?LoyaltyEventCreateReward $value = null): self
    {
        $this->createReward = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventRedeemReward
     */
    public function getRedeemReward(): ?LoyaltyEventRedeemReward
    {
        return $this->redeemReward;
    }

    /**
     * @param ?LoyaltyEventRedeemReward $value
     */
    public function setRedeemReward(?LoyaltyEventRedeemReward $value = null): self
    {
        $this->redeemReward = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventDeleteReward
     */
    public function getDeleteReward(): ?LoyaltyEventDeleteReward
    {
        return $this->deleteReward;
    }

    /**
     * @param ?LoyaltyEventDeleteReward $value
     */
    public function setDeleteReward(?LoyaltyEventDeleteReward $value = null): self
    {
        $this->deleteReward = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventAdjustPoints
     */
    public function getAdjustPoints(): ?LoyaltyEventAdjustPoints
    {
        return $this->adjustPoints;
    }

    /**
     * @param ?LoyaltyEventAdjustPoints $value
     */
    public function setAdjustPoints(?LoyaltyEventAdjustPoints $value = null): self
    {
        $this->adjustPoints = $value;
        return $this;
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
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return value-of<LoyaltyEventSource>
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param value-of<LoyaltyEventSource> $value
     */
    public function setSource(string $value): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventExpirePoints
     */
    public function getExpirePoints(): ?LoyaltyEventExpirePoints
    {
        return $this->expirePoints;
    }

    /**
     * @param ?LoyaltyEventExpirePoints $value
     */
    public function setExpirePoints(?LoyaltyEventExpirePoints $value = null): self
    {
        $this->expirePoints = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventOther
     */
    public function getOtherEvent(): ?LoyaltyEventOther
    {
        return $this->otherEvent;
    }

    /**
     * @param ?LoyaltyEventOther $value
     */
    public function setOtherEvent(?LoyaltyEventOther $value = null): self
    {
        $this->otherEvent = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyEventAccumulatePromotionPoints
     */
    public function getAccumulatePromotionPoints(): ?LoyaltyEventAccumulatePromotionPoints
    {
        return $this->accumulatePromotionPoints;
    }

    /**
     * @param ?LoyaltyEventAccumulatePromotionPoints $value
     */
    public function setAccumulatePromotionPoints(?LoyaltyEventAccumulatePromotionPoints $value = null): self
    {
        $this->accumulatePromotionPoints = $value;
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
