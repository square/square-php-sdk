<?php

namespace Square\Loyalty\Programs\Promotions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetPromotionsRequest extends JsonSerializableType
{
    /**
     * The ID of the base [loyalty program](entity:LoyaltyProgram). To get the program ID,
     * call [RetrieveLoyaltyProgram](api-endpoint:Loyalty-RetrieveLoyaltyProgram) using the `main` keyword.
     *
     * @var string $programId
     */
    private string $programId;

    /**
     * @var string $promotionId The ID of the [loyalty promotion](entity:LoyaltyPromotion) to retrieve.
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
