<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomerAddressFilter;
use Square\Legacy\Models\CustomerTextFilter;

/**
 * Builder for model CustomerAddressFilter
 *
 * @see CustomerAddressFilter
 */
class CustomerAddressFilterBuilder
{
    /**
     * @var CustomerAddressFilter
     */
    private $instance;

    private function __construct(CustomerAddressFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Customer Address Filter Builder object.
     */
    public static function init(): self
    {
        return new self(new CustomerAddressFilter());
    }

    /**
     * Sets postal code field.
     *
     * @param CustomerTextFilter|null $value
     */
    public function postalCode(?CustomerTextFilter $value): self
    {
        $this->instance->setPostalCode($value);
        return $this;
    }

    /**
     * Sets country field.
     *
     * @param string|null $value
     */
    public function country(?string $value): self
    {
        $this->instance->setCountry($value);
        return $this;
    }

    /**
     * Initializes a new Customer Address Filter object.
     */
    public function build(): CustomerAddressFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
