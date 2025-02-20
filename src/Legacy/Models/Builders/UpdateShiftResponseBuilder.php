<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Shift;
use Square\Legacy\Models\UpdateShiftResponse;

/**
 * Builder for model UpdateShiftResponse
 *
 * @see UpdateShiftResponse
 */
class UpdateShiftResponseBuilder
{
    /**
     * @var UpdateShiftResponse
     */
    private $instance;

    private function __construct(UpdateShiftResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Shift Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateShiftResponse());
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
     * Initializes a new Update Shift Response object.
     */
    public function build(): UpdateShiftResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
