<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A range of purchase price that qualifies.
 */
class CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange extends JsonSerializableType
{
    /**
     * @var Money $min
     */
    #[JsonProperty('min')]
    private Money $min;

    /**
     * @var Money $max
     */
    #[JsonProperty('max')]
    private Money $max;

    /**
     * @param array{
     *   min: Money,
     *   max: Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->min = $values['min'];
        $this->max = $values['max'];
    }

    /**
     * @return Money
     */
    public function getMin(): Money
    {
        return $this->min;
    }

    /**
     * @param Money $value
     */
    public function setMin(Money $value): self
    {
        $this->min = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getMax(): Money
    {
        return $this->max;
    }

    /**
     * @param Money $value
     */
    public function setMax(Money $value): self
    {
        $this->max = $value;
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
