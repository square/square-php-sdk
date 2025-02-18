<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ChargeResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Transaction;

/**
 * Builder for model ChargeResponse
 *
 * @see ChargeResponse
 */
class ChargeResponseBuilder
{
    /**
     * @var ChargeResponse
     */
    private $instance;

    private function __construct(ChargeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Charge Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ChargeResponse());
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
     * Sets transaction field.
     *
     * @param Transaction|null $value
     */
    public function transaction(?Transaction $value): self
    {
        $this->instance->setTransaction($value);
        return $this;
    }

    /**
     * Initializes a new Charge Response object.
     */
    public function build(): ChargeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
