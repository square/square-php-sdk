<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BreakType;
use Square\Models\Error;
use Square\Models\UpdateBreakTypeResponse;

/**
 * Builder for model UpdateBreakTypeResponse
 *
 * @see UpdateBreakTypeResponse
 */
class UpdateBreakTypeResponseBuilder
{
    /**
     * @var UpdateBreakTypeResponse
     */
    private $instance;

    private function __construct(UpdateBreakTypeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Break Type Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateBreakTypeResponse());
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
     * Initializes a new Update Break Type Response object.
     */
    public function build(): UpdateBreakTypeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
