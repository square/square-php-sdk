<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Money;
use Square\Models\OrderLineItemAppliedServiceCharge;

/**
 * Builder for model OrderLineItemAppliedServiceCharge
 *
 * @see OrderLineItemAppliedServiceCharge
 */
class OrderLineItemAppliedServiceChargeBuilder
{
    /**
     * @var OrderLineItemAppliedServiceCharge
     */
    private $instance;

    private function __construct(OrderLineItemAppliedServiceCharge $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Order Line Item Applied Service Charge Builder object.
     *
     * @param string $serviceChargeUid
     */
    public static function init(string $serviceChargeUid): self
    {
        return new self(new OrderLineItemAppliedServiceCharge($serviceChargeUid));
    }

    /**
     * Sets uid field.
     *
     * @param string|null $value
     */
    public function uid(?string $value): self
    {
        $this->instance->setUid($value);
        return $this;
    }

    /**
     * Unsets uid field.
     */
    public function unsetUid(): self
    {
        $this->instance->unsetUid();
        return $this;
    }

    /**
     * Sets applied money field.
     *
     * @param Money|null $value
     */
    public function appliedMoney(?Money $value): self
    {
        $this->instance->setAppliedMoney($value);
        return $this;
    }

    /**
     * Initializes a new Order Line Item Applied Service Charge object.
     */
    public function build(): OrderLineItemAppliedServiceCharge
    {
        return CoreHelper::clone($this->instance);
    }
}
