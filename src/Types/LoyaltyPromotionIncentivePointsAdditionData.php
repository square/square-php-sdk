<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the metadata for a `POINTS_ADDITION` type of [loyalty promotion incentive](entity:LoyaltyPromotionIncentive).
 */
class LoyaltyPromotionIncentivePointsAdditionData extends JsonSerializableType
{
    /**
     * The number of additional points to earn each time the promotion is triggered. For example,
     * suppose a purchase qualifies for 5 points from the base loyalty program. If the purchase also
     * qualifies for a `POINTS_ADDITION` promotion incentive with a `points_addition` of 3, the buyer
     * earns a total of 8 points (5 program points + 3 promotion points = 8 points).
     *
     * @var int $pointsAddition
     */
    #[JsonProperty('points_addition')]
    private int $pointsAddition;

    /**
     * @param array{
     *   pointsAddition: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pointsAddition = $values['pointsAddition'];
    }

    /**
     * @return int
     */
    public function getPointsAddition(): int
    {
        return $this->pointsAddition;
    }

    /**
     * @param int $value
     */
    public function setPointsAddition(int $value): self
    {
        $this->pointsAddition = $value;
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
