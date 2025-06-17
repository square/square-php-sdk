<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the loyalty promotion associated with a `loyalty.promotion.updated` event.
 */
class LoyaltyPromotionUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?LoyaltyPromotion $loyaltyPromotion The loyalty promotion that was updated.
     */
    #[JsonProperty('loyalty_promotion')]
    private ?LoyaltyPromotion $loyaltyPromotion;

    /**
     * @param array{
     *   loyaltyPromotion?: ?LoyaltyPromotion,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->loyaltyPromotion = $values['loyaltyPromotion'] ?? null;
    }

    /**
     * @return ?LoyaltyPromotion
     */
    public function getLoyaltyPromotion(): ?LoyaltyPromotion
    {
        return $this->loyaltyPromotion;
    }

    /**
     * @param ?LoyaltyPromotion $value
     */
    public function setLoyaltyPromotion(?LoyaltyPromotion $value = null): self
    {
        $this->loyaltyPromotion = $value;
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
