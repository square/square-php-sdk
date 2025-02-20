<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateRefundResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Refund;

/**
 * Builder for model CreateRefundResponse
 *
 * @see CreateRefundResponse
 */
class CreateRefundResponseBuilder
{
    /**
     * @var CreateRefundResponse
     */
    private $instance;

    private function __construct(CreateRefundResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Refund Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateRefundResponse());
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
     * @param Refund|null $value
     */
    public function refund(?Refund $value): self
    {
        $this->instance->setRefund($value);
        return $this;
    }

    /**
     * Initializes a new Create Refund Response object.
     */
    public function build(): CreateRefundResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
