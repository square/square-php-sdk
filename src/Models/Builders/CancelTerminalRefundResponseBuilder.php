<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CancelTerminalRefundResponse;
use Square\Models\Error;
use Square\Models\TerminalRefund;

/**
 * Builder for model CancelTerminalRefundResponse
 *
 * @see CancelTerminalRefundResponse
 */
class CancelTerminalRefundResponseBuilder
{
    /**
     * @var CancelTerminalRefundResponse
     */
    private $instance;

    private function __construct(CancelTerminalRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Terminal Refund Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CancelTerminalRefundResponse());
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets refund field.
     *
     * @param TerminalRefund|null $value
     */
    public function refund(?TerminalRefund $value): self
    {
        $this->instance->setRefund($value);
        return $this;
    }

    /**
     * Initializes a new Cancel Terminal Refund Response object.
     */
    public function build(): CancelTerminalRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
