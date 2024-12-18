<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeleteOrderCustomAttributeResponse;
use Square\Models\Error;

/**
 * Builder for model DeleteOrderCustomAttributeResponse
 *
 * @see DeleteOrderCustomAttributeResponse
 */
class DeleteOrderCustomAttributeResponseBuilder
{
    /**
     * @var DeleteOrderCustomAttributeResponse
     */
    private $instance;

    private function __construct(DeleteOrderCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Order Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteOrderCustomAttributeResponse());
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
     * Initializes a new Delete Order Custom Attribute Response object.
     */
    public function build(): DeleteOrderCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
