<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteCustomerCustomAttributeDefinitionResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteCustomerCustomAttributeDefinitionResponse
 *
 * @see DeleteCustomerCustomAttributeDefinitionResponse
 */
class DeleteCustomerCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var DeleteCustomerCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(DeleteCustomerCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Customer Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteCustomerCustomAttributeDefinitionResponse());
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
     * Initializes a new Delete Customer Custom Attribute Definition Response object.
     */
    public function build(): DeleteCustomerCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
