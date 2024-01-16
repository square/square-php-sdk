<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Money;
use Square\Models\OrderReturnTip;

/**
 * Builder for model OrderReturnTip
 *
 * @see OrderReturnTip
 */
class OrderReturnTipBuilder
{
    /**
     * @var OrderReturnTip
     */
    private $instance;

    private function __construct(OrderReturnTip $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new order return tip Builder object.
     */
    public static function init(): self
    {
        return new self(new OrderReturnTip());
    }

    /**
     * Sets uid field.
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
     */
    public function appliedMoney(?Money $value): self
    {
        $this->instance->setAppliedMoney($value);
        return $this;
    }

    /**
     * Sets source tender uid field.
     */
    public function sourceTenderUid(?string $value): self
    {
        $this->instance->setSourceTenderUid($value);
        return $this;
    }

    /**
     * Unsets source tender uid field.
     */
    public function unsetSourceTenderUid(): self
    {
        $this->instance->unsetSourceTenderUid();
        return $this;
    }

    /**
     * Sets source tender id field.
     */
    public function sourceTenderId(?string $value): self
    {
        $this->instance->setSourceTenderId($value);
        return $this;
    }

    /**
     * Unsets source tender id field.
     */
    public function unsetSourceTenderId(): self
    {
        $this->instance->unsetSourceTenderId();
        return $this;
    }

    /**
     * Initializes a new order return tip object.
     */
    public function build(): OrderReturnTip
    {
        return CoreHelper::clone($this->instance);
    }
}
