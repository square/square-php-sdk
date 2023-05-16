<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttribute;
use Square\Models\RetrieveMerchantCustomAttributeResponse;

/**
 * Builder for model RetrieveMerchantCustomAttributeResponse
 *
 * @see RetrieveMerchantCustomAttributeResponse
 */
class RetrieveMerchantCustomAttributeResponseBuilder
{
    /**
     * @var RetrieveMerchantCustomAttributeResponse
     */
    private $instance;

    private function __construct(RetrieveMerchantCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new retrieve merchant custom attribute response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveMerchantCustomAttributeResponse());
    }

    /**
     * Sets custom attribute field.
     */
    public function customAttribute(?CustomAttribute $value): self
    {
        $this->instance->setCustomAttribute($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new retrieve merchant custom attribute response object.
     */
    public function build(): RetrieveMerchantCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
