<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetTerminalRefundResponse;
use Square\Legacy\Models\TerminalRefund;

/**
 * Builder for model GetTerminalRefundResponse
 *
 * @see GetTerminalRefundResponse
 */
class GetTerminalRefundResponseBuilder
{
    /**
     * @var GetTerminalRefundResponse
     */
    private $instance;

    private function __construct(GetTerminalRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Terminal Refund Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetTerminalRefundResponse());
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
     * Initializes a new Get Terminal Refund Response object.
     */
    public function build(): GetTerminalRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
