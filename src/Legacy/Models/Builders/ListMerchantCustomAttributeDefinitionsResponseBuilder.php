<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListMerchantCustomAttributeDefinitionsResponse;

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
     * Initializes a new List Merchant Custom Attribute Definitions Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListMerchantCustomAttributeDefinitionsResponse());
    }

    /**
     * Sets custom attribute definitions field.
     *
     * @param CustomAttributeDefinition[]|null $value
     */
    public function customAttributeDefinitions(?array $value): self
    {
        $this->instance->setCustomAttributeDefinitions($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new List Merchant Custom Attribute Definitions Response object.
     */
    public function build(): ListMerchantCustomAttributeDefinitionsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
