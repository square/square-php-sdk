<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveMerchantCustomAttributeDefinitionResponse;

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
     * Initializes a new Retrieve Merchant Custom Attribute Definition Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveMerchantCustomAttributeDefinitionResponse());
    }

    /**
     * Sets custom attribute definition field.
     *
     * @param CustomAttributeDefinition|null $value
     */
    public function customAttributeDefinition(?CustomAttributeDefinition $value): self
    {
        $this->instance->setCustomAttributeDefinition($value);
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
     * Initializes a new Retrieve Merchant Custom Attribute Definition Response object.
     */
    public function build(): RetrieveMerchantCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
