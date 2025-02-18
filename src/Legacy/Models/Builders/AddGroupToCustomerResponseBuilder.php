<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\AddGroupToCustomerResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model AddGroupToCustomerResponse
 *
 * @see AddGroupToCustomerResponse
 */
class AddGroupToCustomerResponseBuilder
{
    /**
     * @var AddGroupToCustomerResponse
     */
    private $instance;

    private function __construct(AddGroupToCustomerResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Add Group To Customer Response Builder object.
     */
    public static function init(): self
    {
        return new self(new AddGroupToCustomerResponse());
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
     * Initializes a new Add Group To Customer Response object.
     */
    public function build(): AddGroupToCustomerResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
