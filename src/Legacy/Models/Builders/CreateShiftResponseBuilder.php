<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateShiftResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Shift;

/**
 * Builder for model CreateShiftResponse
 *
 * @see CreateShiftResponse
 */
class CreateShiftResponseBuilder
{
    /**
     * @var CreateShiftResponse
     */
    private $instance;

    private function __construct(CreateShiftResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Shift Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateShiftResponse());
    }

    /**
     * Sets shift field.
     *
     * @param Shift|null $value
     */
    public function shift(?Shift $value): self
    {
        $this->instance->setShift($value);
        return $this;
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
     * Initializes a new Create Shift Response object.
     */
    public function build(): CreateShiftResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
