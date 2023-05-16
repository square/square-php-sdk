<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListMerchantCustomAttributeDefinitionsResponse;

/**
 * Builder for model ListMerchantCustomAttributeDefinitionsResponse
 *
 * @see ListMerchantCustomAttributeDefinitionsResponse
 */
class ListMerchantCustomAttributeDefinitionsResponseBuilder
{
    /**
     * @var ListMerchantCustomAttributeDefinitionsResponse
     */
    private $instance;

    private function __construct(ListMerchantCustomAttributeDefinitionsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list merchant custom attribute definitions response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListMerchantCustomAttributeDefinitionsResponse());
    }

    /**
     * Sets custom attribute definitions field.
     */
    public function customAttributeDefinitions(?array $value): self
    {
        $this->instance->setCustomAttributeDefinitions($value);
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
     * Initializes a new list merchant custom attribute definitions response object.
     */
    public function build(): ListMerchantCustomAttributeDefinitionsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
