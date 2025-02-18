<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the metadata for a `POINTS_MULTIPLIER` type of [loyalty promotion incentive](entity:LoyaltyPromotionIncentive).
 */
class LoyaltyPromotionIncentivePointsMultiplierData extends JsonSerializableType
{
    /**
     * The multiplier used to calculate the number of points earned each time the promotion
     * is triggered. For example, suppose a purchase qualifies for 5 points from the base loyalty program.
     * If the purchase also qualifies for a `POINTS_MULTIPLIER` promotion incentive with a `points_multiplier`
     * of 3, the buyer earns a total of 15 points (5 program points x 3 promotion multiplier = 15 points).
     *
     * DEPRECATED at version 2023-08-16. Replaced by the `multiplier` field.
     *
     * One of the following is required when specifying a points multiplier:
     * - (Recommended) The `multiplier` field.
     * - This deprecated `points_multiplier` field. If provided in the request, Square also returns `multiplier`
     * with the equivalent value.
     *
     * @var ?int $pointsMultiplier
     */
    #[JsonProperty('points_multiplier')]
    private ?int $pointsMultiplier;

    /**
     * The multiplier used to calculate the number of points earned each time the promotion is triggered,
     * specified as a string representation of a decimal. Square supports multipliers up to 10x, with three
     * point precision for decimal multipliers. For example, suppose a purchase qualifies for 4 points from the
     * base loyalty program. If the purchase also qualifies for a `POINTS_MULTIPLIER` promotion incentive with a
     * `multiplier` of "1.5", the buyer earns a total of 6 points (4 program points x 1.5 promotion multiplier = 6 points).
     * Fractional points are dropped.
     *
     * One of the following is required when specifying a points multiplier:
     * - (Recommended) This `multiplier` field.
     * - The deprecated `points_multiplier` field. If provided in the request, Square also returns `multiplier`
     * with the equivalent value.
     *
     * @var ?string $multiplier
     */
    #[JsonProperty('multiplier')]
    private ?string $multiplier;

    /**
     * @param array{
     *   pointsMultiplier?: ?int,
     *   multiplier?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pointsMultiplier = $values['pointsMultiplier'] ?? null;
        $this->multiplier = $values['multiplier'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getPointsMultiplier(): ?int
    {
        return $this->pointsMultiplier;
    }

    /**
     * @param ?int $value
     */
    public function setPointsMultiplier(?int $value = null): self
    {
        $this->pointsMultiplier = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMultiplier(): ?string
    {
        return $this->multiplier;
    }

    /**
     * @param ?string $value
     */
    public function setMultiplier(?string $value = null): self
    {
        $this->multiplier = $value;
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
