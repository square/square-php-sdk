<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Provides metadata when the event `type` is `ACCUMULATE_PROMOTION_POINTS`.
 */
class LoyaltyEventAccumulatePromotionPoints extends JsonSerializableType
{
    /**
     * @var ?string $loyaltyProgramId The Square-assigned ID of the [loyalty program](entity:LoyaltyProgram).
     */
    #[JsonProperty('loyalty_program_id')]
    private ?string $loyaltyProgramId;

    /**
     * @var ?string $loyaltyPromotionId The Square-assigned ID of the [loyalty promotion](entity:LoyaltyPromotion).
     */
    #[JsonProperty('loyalty_promotion_id')]
    private ?string $loyaltyPromotionId;

    /**
     * @var ?int $points The number of points earned by the event.
     */
    #[JsonProperty('points')]
    private ?int $points;

    /**
     * The ID of the [order](entity:Order) for which the buyer earned the promotion points.
     * Only applications that use the Orders API to process orders can trigger this event.
     *
     * @var ?string $orderId
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * @param array{
     *   loyaltyProgramId?: ?string,
     *   loyaltyPromotionId?: ?string,
     *   points?: ?int,
     *   orderId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyProgramId = $values['loyaltyProgramId'] ?? null;
        $this->loyaltyPromotionId = $values['loyaltyPromotionId'] ?? null;
        $this->points = $values['points'] ?? null;
        $this->orderId = $values['orderId'] ?? null;
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
     * @return ?string
     */
    public function getLoyaltyPromotionId(): ?string
    {
        return $this->loyaltyPromotionId;
    }

    /**
     * @param ?string $value
     */
    public function setLoyaltyPromotionId(?string $value = null): self
    {
        $this->loyaltyPromotionId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @param ?int $value
     */
    public function setPoints(?int $value = null): self
    {
        $this->points = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
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
