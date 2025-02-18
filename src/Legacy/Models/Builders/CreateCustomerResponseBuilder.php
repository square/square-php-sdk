<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateCustomerResponse;
use Square\Legacy\Models\Customer;
use Square\Legacy\Models\Error;

/**
 * Builder for model CreateCustomerResponse
 *
 * @see CreateCustomerResponse
 */
class CreateCustomerResponseBuilder
{
    /**
     * @var CreateCustomerResponse
     */
    private $instance;

    private function __construct(CreateCustomerResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Customer Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateCustomerResponse());
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
     * Sets customer field.
     *
     * @param Customer|null $value
     */
    public function customer(?Customer $value): self
    {
        $this->instance->setCustomer($value);
        return $this;
    }

    /**
     * Initializes a new Create Customer Response object.
     */
    public function build(): CreateCustomerResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
