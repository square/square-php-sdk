<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteOrderCustomAttributeDefinitionResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteOrderCustomAttributeDefinitionResponse
 *
 * @see DeleteOrderCustomAttributeDefinitionResponse
 */
class DeleteOrderCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var DeleteOrderCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(DeleteOrderCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Order Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteOrderCustomAttributeDefinitionResponse());
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
     * Initializes a new Delete Order Custom Attribute Definition Response object.
     */
    public function build(): DeleteOrderCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
