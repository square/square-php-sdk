<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateTerminalRefundResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\TerminalRefund;

/**
 * Builder for model CreateTerminalRefundResponse
 *
 * @see CreateTerminalRefundResponse
 */
class CreateTerminalRefundResponseBuilder
{
    /**
     * @var CreateTerminalRefundResponse
     */
    private $instance;

    private function __construct(CreateTerminalRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Terminal Refund Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateTerminalRefundResponse());
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
     * Initializes a new Create Terminal Refund Response object.
     */
    public function build(): CreateTerminalRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
