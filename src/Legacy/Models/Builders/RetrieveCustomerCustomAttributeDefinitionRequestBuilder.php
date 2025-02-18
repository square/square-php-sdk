<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveCustomerCustomAttributeDefinitionRequest;

/**
 * Builder for model RetrieveCustomerCustomAttributeDefinitionRequest
 *
 * @see RetrieveCustomerCustomAttributeDefinitionRequest
 */
class RetrieveCustomerCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var RetrieveCustomerCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(RetrieveCustomerCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Customer Custom Attribute Definition Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveCustomerCustomAttributeDefinitionRequest());
    }

    /**
     * Sets version field.
     *
     * @param int|null $value
     */
    public function version(?int $value): self
    {
        $this->instance->setVersion($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Customer Custom Attribute Definition Request object.
     */
    public function build(): RetrieveCustomerCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
