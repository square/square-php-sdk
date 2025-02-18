<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes a phase in a subscription plan variation. For more information, see [Subscription Plans and Variations](https://developer.squareup.com/docs/subscriptions-api/plans-and-variations).
 */
class SubscriptionPhase extends JsonSerializableType
{
    /**
     * @var ?string $uid The Square-assigned ID of the subscription phase. This field cannot be changed after a `SubscriptionPhase` is created.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * The billing cadence of the phase. For example, weekly or monthly. This field cannot be changed after a `SubscriptionPhase` is created.
     * See [SubscriptionCadence](#type-subscriptioncadence) for possible values
     *
     * @var value-of<SubscriptionCadence> $cadence
     */
    #[JsonProperty('cadence')]
    private string $cadence;

    /**
     * @var ?int $periods The number of `cadence`s the phase lasts. If not set, the phase never ends. Only the last phase can be indefinite. This field cannot be changed after a `SubscriptionPhase` is created.
     */
    #[JsonProperty('periods')]
    private ?int $periods;

    /**
     * @var ?Money $recurringPriceMoney The amount to bill for each `cadence`. Failure to specify this field results in a `MISSING_REQUIRED_PARAMETER` error at runtime.
     */
    #[JsonProperty('recurring_price_money')]
    private ?Money $recurringPriceMoney;

    /**
     * @var ?int $ordinal The position this phase appears in the sequence of phases defined for the plan, indexed from 0. This field cannot be changed after a `SubscriptionPhase` is created.
     */
    #[JsonProperty('ordinal')]
    private ?int $ordinal;

    /**
     * @var ?SubscriptionPricing $pricing The subscription pricing.
     */
    #[JsonProperty('pricing')]
    private ?SubscriptionPricing $pricing;

    /**
     * @param array{
     *   cadence: value-of<SubscriptionCadence>,
     *   uid?: ?string,
     *   periods?: ?int,
     *   recurringPriceMoney?: ?Money,
     *   ordinal?: ?int,
     *   pricing?: ?SubscriptionPricing,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->cadence = $values['cadence'];
        $this->periods = $values['periods'] ?? null;
        $this->recurringPriceMoney = $values['recurringPriceMoney'] ?? null;
        $this->ordinal = $values['ordinal'] ?? null;
        $this->pricing = $values['pricing'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return value-of<SubscriptionCadence>
     */
    public function getCadence(): string
    {
        return $this->cadence;
    }

    /**
     * @param value-of<SubscriptionCadence> $value
     */
    public function setCadence(string $value): self
    {
        $this->cadence = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getPeriods(): ?int
    {
        return $this->periods;
    }

    /**
     * @param ?int $value
     */
    public function setPeriods(?int $value = null): self
    {
        $this->periods = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getRecurringPriceMoney(): ?Money
    {
        return $this->recurringPriceMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setRecurringPriceMoney(?Money $value = null): self
    {
        $this->recurringPriceMoney = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOrdinal(): ?int
    {
        return $this->ordinal;
    }

    /**
     * @param ?int $value
     */
    public function setOrdinal(?int $value = null): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?SubscriptionPricing
     */
    public function getPricing(): ?SubscriptionPricing
    {
        return $this->pricing;
    }

    /**
     * @param ?SubscriptionPricing $value
     */
    public function setPricing(?SubscriptionPricing $value = null): self
    {
        $this->pricing = $value;
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
