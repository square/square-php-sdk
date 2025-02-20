<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteLocationCustomAttributeResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteLocationCustomAttributeResponse
 *
 * @see DeleteLocationCustomAttributeResponse
 */
class DeleteLocationCustomAttributeResponseBuilder
{
    /**
     * @var DeleteLocationCustomAttributeResponse
     */
    private $instance;

    private function __construct(DeleteLocationCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Location Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteLocationCustomAttributeResponse());
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
     * Initializes a new Delete Location Custom Attribute Response object.
     */
    public function build(): DeleteLocationCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
