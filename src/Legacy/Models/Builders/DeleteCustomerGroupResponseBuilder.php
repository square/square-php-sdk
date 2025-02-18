<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteCustomerGroupResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteCustomerGroupResponse
 *
 * @see DeleteCustomerGroupResponse
 */
class DeleteCustomerGroupResponseBuilder
{
    /**
     * @var DeleteCustomerGroupResponse
     */
    private $instance;

    private function __construct(DeleteCustomerGroupResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Customer Group Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteCustomerGroupResponse());
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
     * Initializes a new Delete Customer Group Response object.
     */
    public function build(): DeleteCustomerGroupResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
