<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttributeDefinition;
use Square\Models\RetrieveMerchantCustomAttributeDefinitionResponse;

/**
 * Builder for model RetrieveMerchantCustomAttributeDefinitionResponse
 *
 * @see RetrieveMerchantCustomAttributeDefinitionResponse
 */
class RetrieveMerchantCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var RetrieveMerchantCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(RetrieveMerchantCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new retrieve merchant custom attribute definition response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveMerchantCustomAttributeDefinitionResponse());
    }

    /**
     * Sets custom attribute definition field.
     */
    public function customAttributeDefinition(?CustomAttributeDefinition $value): self
    {
        $this->instance->setCustomAttributeDefinition($value);
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
     * Initializes a new retrieve merchant custom attribute definition response object.
     */
    public function build(): RetrieveMerchantCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
