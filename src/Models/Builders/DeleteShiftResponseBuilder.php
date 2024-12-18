<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteShiftResponse;
use Square\Models\Error;

/**
 * Builder for model DeleteShiftResponse
 *
 * @see DeleteShiftResponse
 */
class DeleteShiftResponseBuilder
{
    /**
     * @var DeleteShiftResponse
     */
    private $instance;

    private function __construct(DeleteShiftResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Shift Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteShiftResponse());
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
     * Initializes a new Delete Shift Response object.
     */
    public function build(): DeleteShiftResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
