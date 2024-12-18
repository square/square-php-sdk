<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BreakType;
use Square\Models\CreateBreakTypeResponse;
use Square\Models\Error;

/**
 * Builder for model CreateBreakTypeResponse
 *
 * @see CreateBreakTypeResponse
 */
class CreateBreakTypeResponseBuilder
{
    /**
     * @var CreateBreakTypeResponse
     */
    private $instance;

    private function __construct(CreateBreakTypeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Break Type Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateBreakTypeResponse());
    }

    /**
     * Sets break type field.
     *
     * @param BreakType|null $value
     */
    public function breakType(?BreakType $value): self
    {
        $this->instance->setBreakType($value);
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
     * Initializes a new Create Break Type Response object.
     */
    public function build(): CreateBreakTypeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
