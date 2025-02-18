<?php

namespace Square\Loyalty\Programs\Promotions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\LoyaltyPromotion;
use Square\Core\Json\JsonProperty;

class CreateLoyaltyPromotionRequest extends JsonSerializableType
{
    /**
     * The ID of the [loyalty program](entity:LoyaltyProgram) to associate with the promotion.
     * To get the program ID, call [RetrieveLoyaltyProgram](api-endpoint:Loyalty-RetrieveLoyaltyProgram)
     * using the `main` keyword.
     *
     * @var string $programId
     */
    private string $programId;

    /**
     * @var LoyaltyPromotion $loyaltyPromotion The loyalty promotion to create.
     */
    #[JsonProperty('loyalty_promotion')]
    private LoyaltyPromotion $loyaltyPromotion;

    /**
     * A unique identifier for this request, which is used to ensure idempotency. For more information,
     * see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   programId: string,
     *   loyaltyPromotion: LoyaltyPromotion,
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->programId = $values['programId'];
        $this->loyaltyPromotion = $values['loyaltyPromotion'];
        $this->idempotencyKey = $values['idempotencyKey'];
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
     * @return LoyaltyPromotion
     */
    public function getLoyaltyPromotion(): LoyaltyPromotion
    {
        return $this->loyaltyPromotion;
    }

    /**
     * @param LoyaltyPromotion $value
     */
    public function setLoyaltyPromotion(LoyaltyPromotion $value): self
    {
        $this->loyaltyPromotion = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }
}
