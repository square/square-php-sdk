<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents how points for a [loyalty promotion](entity:LoyaltyPromotion) are calculated,
 * either by multiplying the points earned from the base program or by adding a specified number
 * of points to the points earned from the base program.
 */
class LoyaltyPromotionIncentive extends JsonSerializableType
{
    /**
     * The type of points incentive.
     * See [LoyaltyPromotionIncentiveType](#type-loyaltypromotionincentivetype) for possible values
     *
     * @var value-of<LoyaltyPromotionIncentiveType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?LoyaltyPromotionIncentivePointsMultiplierData $pointsMultiplierData Additional data for a `POINTS_MULTIPLIER` incentive type.
     */
    #[JsonProperty('points_multiplier_data')]
    private ?LoyaltyPromotionIncentivePointsMultiplierData $pointsMultiplierData;

    /**
     * @var ?LoyaltyPromotionIncentivePointsAdditionData $pointsAdditionData Additional data for a `POINTS_ADDITION` incentive type.
     */
    #[JsonProperty('points_addition_data')]
    private ?LoyaltyPromotionIncentivePointsAdditionData $pointsAdditionData;

    /**
     * @param array{
     *   type: value-of<LoyaltyPromotionIncentiveType>,
     *   pointsMultiplierData?: ?LoyaltyPromotionIncentivePointsMultiplierData,
     *   pointsAdditionData?: ?LoyaltyPromotionIncentivePointsAdditionData,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->pointsMultiplierData = $values['pointsMultiplierData'] ?? null;
        $this->pointsAdditionData = $values['pointsAdditionData'] ?? null;
    }

    /**
     * @return value-of<LoyaltyPromotionIncentiveType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<LoyaltyPromotionIncentiveType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyPromotionIncentivePointsMultiplierData
     */
    public function getPointsMultiplierData(): ?LoyaltyPromotionIncentivePointsMultiplierData
    {
        return $this->pointsMultiplierData;
    }

    /**
     * @param ?LoyaltyPromotionIncentivePointsMultiplierData $value
     */
    public function setPointsMultiplierData(?LoyaltyPromotionIncentivePointsMultiplierData $value = null): self
    {
        $this->pointsMultiplierData = $value;
        return $this;
    }

    /**
     * @return ?LoyaltyPromotionIncentivePointsAdditionData
     */
    public function getPointsAdditionData(): ?LoyaltyPromotionIncentivePointsAdditionData
    {
        return $this->pointsAdditionData;
    }

    /**
     * @param ?LoyaltyPromotionIncentivePointsAdditionData $value
     */
    public function setPointsAdditionData(?LoyaltyPromotionIncentivePointsAdditionData $value = null): self
    {
        $this->pointsAdditionData = $value;
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
