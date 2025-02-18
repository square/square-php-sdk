<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttribute;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\UpsertCustomerCustomAttributeResponse;

/**
 * Builder for model UpsertCustomerCustomAttributeResponse
 *
 * @see UpsertCustomerCustomAttributeResponse
 */
class UpsertCustomerCustomAttributeResponseBuilder
{
    /**
     * @var UpsertCustomerCustomAttributeResponse
     */
    private $instance;

    private function __construct(UpsertCustomerCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Upsert Customer Custom Attribute Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpsertCustomerCustomAttributeResponse());
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
     * Initializes a new Upsert Customer Custom Attribute Response object.
     */
    public function build(): UpsertCustomerCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
