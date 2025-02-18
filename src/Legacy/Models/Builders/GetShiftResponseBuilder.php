<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GetShiftResponse;
use Square\Legacy\Models\Shift;

/**
 * Builder for model GetShiftResponse
 *
 * @see GetShiftResponse
 */
class GetShiftResponseBuilder
{
    /**
     * @var GetShiftResponse
     */
    private $instance;

    private function __construct(GetShiftResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Get Shift Response Builder object.
     */
    public static function init(): self
    {
        return new self(new GetShiftResponse());
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
     * Initializes a new Get Shift Response object.
     */
    public function build(): GetShiftResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
