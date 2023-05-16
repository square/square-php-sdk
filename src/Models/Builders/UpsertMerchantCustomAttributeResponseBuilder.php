<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttribute;
use Square\Models\UpsertMerchantCustomAttributeResponse;

/**
 * Builder for model UpsertMerchantCustomAttributeResponse
 *
 * @see UpsertMerchantCustomAttributeResponse
 */
class UpsertMerchantCustomAttributeResponseBuilder
{
    /**
     * @var UpsertMerchantCustomAttributeResponse
     */
    private $instance;

    private function __construct(UpsertMerchantCustomAttributeResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new upsert merchant custom attribute response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpsertMerchantCustomAttributeResponse());
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
     * Initializes a new upsert merchant custom attribute response object.
     */
    public function build(): UpsertMerchantCustomAttributeResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
