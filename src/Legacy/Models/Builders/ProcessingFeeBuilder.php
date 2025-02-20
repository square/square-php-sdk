<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Money;
use Square\Legacy\Models\ProcessingFee;

/**
 * Builder for model ProcessingFee
 *
 * @see ProcessingFee
 */
class ProcessingFeeBuilder
{
    /**
     * @var ProcessingFee
     */
    private $instance;

    private function __construct(ProcessingFee $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Processing Fee Builder object.
     */
    public static function init(): self
    {
        return new self(new ProcessingFee());
    }

    /**
     * Sets effective at field.
     *
     * @param string|null $value
     */
    public function effectiveAt(?string $value): self
    {
        $this->instance->setEffectiveAt($value);
        return $this;
    }

    /**
     * Unsets effective at field.
     */
    public function unsetEffectiveAt(): self
    {
        $this->instance->unsetEffectiveAt();
        return $this;
    }

    /**
     * Sets type field.
     *
     * @param string|null $value
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Unsets type field.
     */
    public function unsetType(): self
    {
        $this->instance->unsetType();
        return $this;
    }

    /**
     * Sets amount money field.
     *
     * @param Money|null $value
     */
    public function amountMoney(?Money $value): self
    {
        $this->instance->setAmountMoney($value);
        return $this;
    }

    /**
     * Initializes a new Processing Fee object.
     */
    public function build(): ProcessingFee
    {
        return CoreHelper::clone($this->instance);
    }
}
