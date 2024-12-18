<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomerCreationSourceFilter;

/**
 * Builder for model CustomerCreationSourceFilter
 *
 * @see CustomerCreationSourceFilter
 */
class CustomerCreationSourceFilterBuilder
{
    /**
     * @var CustomerCreationSourceFilter
     */
    private $instance;

    private function __construct(CustomerCreationSourceFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Creation Source Filter Builder object.
     */
    public static function init(): self
    {
        return new self(new CustomerCreationSourceFilter());
    }

    /**
     * Sets values field.
     *
     * @param string[]|null $value
     */
    public function values(?array $value): self
    {
        $this->instance->setValues($value);
        return $this;
    }

    /**
     * Unsets values field.
     */
    public function unsetValues(): self
    {
        $this->instance->unsetValues();
        return $this;
    }

    /**
     * Sets rule field.
     *
     * @param string|null $value
     */
    public function rule(?string $value): self
    {
        $this->instance->setRule($value);
        return $this;
    }

    /**
     * Initializes a new Customer Creation Source Filter object.
     */
    public function build(): CustomerCreationSourceFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
