<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RemoveGroupFromCustomerResponse;

/**
 * Builder for model RemoveGroupFromCustomerResponse
 *
 * @see RemoveGroupFromCustomerResponse
 */
class RemoveGroupFromCustomerResponseBuilder
{
    /**
     * @var RemoveGroupFromCustomerResponse
     */
    private $instance;

    private function __construct(RemoveGroupFromCustomerResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Remove Group From Customer Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RemoveGroupFromCustomerResponse());
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
     * Initializes a new Remove Group From Customer Response object.
     */
    public function build(): RemoveGroupFromCustomerResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
