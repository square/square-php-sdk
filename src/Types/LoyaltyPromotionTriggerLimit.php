<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the number of times a buyer can earn points during a [loyalty promotion](entity:LoyaltyPromotion).
 * If this field is not set, buyers can trigger the promotion an unlimited number of times to earn points during
 * the time that the promotion is available.
 *
 * A purchase that is disqualified from earning points because of this limit might qualify for another active promotion.
 */
class LoyaltyPromotionTriggerLimit extends JsonSerializableType
{
    /**
     * @var int $times The maximum number of times a buyer can trigger the promotion during the specified `interval`.
     */
    #[JsonProperty('times')]
    private int $times;

    /**
     * The time period the limit applies to.
     * See [LoyaltyPromotionTriggerLimitInterval](#type-loyaltypromotiontriggerlimitinterval) for possible values
     *
     * @var ?value-of<LoyaltyPromotionTriggerLimitInterval> $interval
     */
    #[JsonProperty('interval')]
    private ?string $interval;

    /**
     * @param array{
     *   times: int,
     *   interval?: ?value-of<LoyaltyPromotionTriggerLimitInterval>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->times = $values['times'];
        $this->interval = $values['interval'] ?? null;
    }

    /**
     * @return int
     */
    public function getTimes(): int
    {
        return $this->times;
    }

    /**
     * @param int $value
     */
    public function setTimes(int $value): self
    {
        $this->times = $value;
        return $this;
    }

    /**
     * @return ?value-of<LoyaltyPromotionTriggerLimitInterval>
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param ?value-of<LoyaltyPromotionTriggerLimitInterval> $value
     */
    public function setInterval(?string $value = null): self
    {
        $this->interval = $value;
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
