<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\BreakType;
use Square\Models\Error;
use Square\Models\ListBreakTypesResponse;

/**
 * Builder for model ListBreakTypesResponse
 *
 * @see ListBreakTypesResponse
 */
class ListBreakTypesResponseBuilder
{
    /**
     * @var ListBreakTypesResponse
     */
    private $instance;

    private function __construct(ListBreakTypesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Break Types Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListBreakTypesResponse());
    }

    /**
     * Sets break types field.
     *
     * @param BreakType[]|null $value
     */
    public function breakTypes(?array $value): self
    {
        $this->instance->setBreakTypes($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new List Break Types Response object.
     */
    public function build(): ListBreakTypesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
