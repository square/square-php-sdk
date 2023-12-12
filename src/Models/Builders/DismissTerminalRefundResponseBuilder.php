<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DismissTerminalRefundResponse;
use Square\Models\TerminalRefund;

/**
 * Builder for model DismissTerminalRefundResponse
 *
 * @see DismissTerminalRefundResponse
 */
class DismissTerminalRefundResponseBuilder
{
    /**
     * @var DismissTerminalRefundResponse
     */
    private $instance;

    private function __construct(DismissTerminalRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new dismiss terminal refund response Builder object.
     */
    public static function init(): self
    {
        return new self(new DismissTerminalRefundResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets refund field.
     */
    public function refund(?TerminalRefund $value): self
    {
        $this->instance->setRefund($value);
        return $this;
    }

    /**
     * Initializes a new dismiss terminal refund response object.
     */
    public function build(): DismissTerminalRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
