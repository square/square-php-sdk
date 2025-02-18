<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteCustomerCustomAttributeResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteCustomerCustomAttributeResponse
 *
 * @see DeleteCustomerCustomAttributeResponse
 */
class DeleteCustomerCustomAttributeResponseBuilder
{
    /**
     * @var DeleteCustomerCustomAttributeResponse
     */
    private $instance;

    private function __construct(DeleteCustomerCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Customer Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteCustomerCustomAttributeResponse());
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
     * Initializes a new Delete Customer Custom Attribute Response object.
     */
    public function build(): DeleteCustomerCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
