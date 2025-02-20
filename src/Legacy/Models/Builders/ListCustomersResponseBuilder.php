<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Customer;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListCustomersResponse;

/**
 * Builder for model ListCustomersResponse
 *
 * @see ListCustomersResponse
 */
class ListCustomersResponseBuilder
{
    /**
     * @var ListCustomersResponse
     */
    private $instance;

    private function __construct(ListCustomersResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Customers Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListCustomersResponse());
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
     * Sets customers field.
     *
     * @param Customer[]|null $value
     */
    public function customers(?array $value): self
    {
        $this->instance->setCustomers($value);
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
     * Sets count field.
     *
     * @param int|null $value
     */
    public function count(?int $value): self
    {
        $this->instance->setCount($value);
        return $this;
    }

    /**
     * Initializes a new List Customers Response object.
     */
    public function build(): ListCustomersResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
