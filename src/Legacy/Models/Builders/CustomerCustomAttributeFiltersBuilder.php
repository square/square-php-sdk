<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomerCustomAttributeFilter;
use Square\Legacy\Models\CustomerCustomAttributeFilters;

/**
 * Builder for model CustomerCustomAttributeFilters
 *
 * @see CustomerCustomAttributeFilters
 */
class CustomerCustomAttributeFiltersBuilder
{
    /**
     * @var CustomerCustomAttributeFilters
     */
    private $instance;

    private function __construct(CustomerCustomAttributeFilters $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Custom Attribute Filters Builder object.
     */
    public static function init(): self
    {
        return new self(new CustomerCustomAttributeFilters());
    }

    /**
     * Sets filters field.
     *
     * @param CustomerCustomAttributeFilter[]|null $value
     */
    public function filters(?array $value): self
    {
        $this->instance->setFilters($value);
        return $this;
    }

    /**
     * Unsets filters field.
     */
    public function unsetFilters(): self
    {
        $this->instance->unsetFilters();
        return $this;
    }

    /**
     * Initializes a new Customer Custom Attribute Filters object.
     */
    public function build(): CustomerCustomAttributeFilters
    {
        return CoreHelper::clone($this->instance);
    }
}
