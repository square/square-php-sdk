<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomerSort;

/**
 * Builder for model CustomerSort
 *
 * @see CustomerSort
 */
class CustomerSortBuilder
{
    /**
     * @var CustomerSort
     */
    private $instance;

    private function __construct(CustomerSort $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Sort Builder object.
     */
    public static function init(): self
    {
        return new self(new CustomerSort());
    }

    /**
     * Sets field field.
     *
     * @param string|null $value
     */
    public function field(?string $value): self
    {
        $this->instance->setField($value);
        return $this;
    }

    /**
     * Sets order field.
     *
     * @param string|null $value
     */
    public function order(?string $value): self
    {
        $this->instance->setOrder($value);
        return $this;
    }

    /**
     * Initializes a new Customer Sort object.
     */
    public function build(): CustomerSort
    {
        return CoreHelper::clone($this->instance);
    }
}
