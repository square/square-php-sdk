<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListMerchantCustomAttributesResponse;

/**
 * Builder for model ListMerchantCustomAttributesResponse
 *
 * @see ListMerchantCustomAttributesResponse
 */
class ListMerchantCustomAttributesResponseBuilder
{
    /**
     * @var ListMerchantCustomAttributesResponse
     */
    private $instance;

    private function __construct(ListMerchantCustomAttributesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list merchant custom attributes response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListMerchantCustomAttributesResponse());
    }

    /**
     * Sets custom attributes field.
     */
    public function customAttributes(?array $value): self
    {
        $this->instance->setCustomAttributes($value);
        return $this;
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new list merchant custom attributes response object.
     */
    public function build(): ListMerchantCustomAttributesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
