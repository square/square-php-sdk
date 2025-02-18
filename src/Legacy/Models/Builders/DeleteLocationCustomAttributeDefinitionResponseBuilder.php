<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteLocationCustomAttributeDefinitionResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteLocationCustomAttributeDefinitionResponse
 *
 * @see DeleteLocationCustomAttributeDefinitionResponse
 */
class DeleteLocationCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var DeleteLocationCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(DeleteLocationCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Location Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteLocationCustomAttributeDefinitionResponse());
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
     * Initializes a new Delete Location Custom Attribute Definition Response object.
     */
    public function build(): DeleteLocationCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
