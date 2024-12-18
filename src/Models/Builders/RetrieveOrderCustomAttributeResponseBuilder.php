<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttribute;
use Square\Models\Error;
use Square\Models\RetrieveOrderCustomAttributeResponse;

/**
 * Builder for model RetrieveOrderCustomAttributeResponse
 *
 * @see RetrieveOrderCustomAttributeResponse
 */
class RetrieveOrderCustomAttributeResponseBuilder
{
    /**
     * @var RetrieveOrderCustomAttributeResponse
     */
    private $instance;

    private function __construct(RetrieveOrderCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Order Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveOrderCustomAttributeResponse());
    }

    /**
     * Sets custom attribute field.
     *
     * @param CustomAttribute|null $value
     */
    public function customAttribute(?CustomAttribute $value): self
    {
        $this->instance->setCustomAttribute($value);
        return $this;
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
     * Initializes a new Retrieve Order Custom Attribute Response object.
     */
    public function build(): RetrieveOrderCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
