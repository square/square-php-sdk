<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomerCustomAttributeFilter;
use Square\Legacy\Models\CustomerCustomAttributeFilterValue;
use Square\Legacy\Models\TimeRange;

/**
 * Builder for model CustomerCustomAttributeFilter
 *
 * @see CustomerCustomAttributeFilter
 */
class CustomerCustomAttributeFilterBuilder
{
    /**
     * @var CustomerCustomAttributeFilter
     */
    private $instance;

    private function __construct(CustomerCustomAttributeFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Custom Attribute Filter Builder object.
     *
     * @param string $key
     */
    public static function init(string $key): self
    {
        return new self(new CustomerCustomAttributeFilter($key));
    }

    /**
     * Sets filter field.
     *
     * @param CustomerCustomAttributeFilterValue|null $value
     */
    public function filter(?CustomerCustomAttributeFilterValue $value): self
    {
        $this->instance->setFilter($value);
        return $this;
    }

    /**
     * Sets updated at field.
     *
     * @param TimeRange|null $value
     */
    public function updatedAt(?TimeRange $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Initializes a new Customer Custom Attribute Filter object.
     */
    public function build(): CustomerCustomAttributeFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
