<?php

namespace Square\Loyalty\Programs\Promotions\Requests;

use Square\Core\Json\JsonSerializableType;

class CancelPromotionsRequest extends JsonSerializableType
{
    /**
     * @var string $programId The ID of the base [loyalty program](entity:LoyaltyProgram).
     */
    private string $programId;

    /**
     * The ID of the [loyalty promotion](entity:LoyaltyPromotion) to cancel. You can cancel a
     * promotion that has an `ACTIVE` or `SCHEDULED` status.
     *
     * @var string $promotionId
     */
    private string $promotionId;

    /**
     * @param array{
     *   programId: string,
     *   promotionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->programId = $values['programId'];
        $this->promotionId = $values['promotionId'];
    }

    /**
     * @return string
     */
    public function getProgramId(): string
    {
        return $this->programId;
    }

    /**
     * @param string $value
     */
    public function setProgramId(string $value): self
    {
        $this->programId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPromotionId(): string
    {
        return $this->promotionId;
    }

    /**
     * @param string $value
     */
    public function setPromotionId(string $value): self
    {
        $this->promotionId = $value;
        return $this;
    }
}
