<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveCustomerCustomAttributeRequest;

/**
 * Builder for model RetrieveCustomerCustomAttributeRequest
 *
 * @see RetrieveCustomerCustomAttributeRequest
 */
class RetrieveCustomerCustomAttributeRequestBuilder
{
    /**
     * @var RetrieveCustomerCustomAttributeRequest
     */
    private $instance;

    private function __construct(RetrieveCustomerCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Customer Custom Attribute Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveCustomerCustomAttributeRequest());
    }

    /**
     * Sets with definition field.
     *
     * @param bool|null $value
     */
    public function withDefinition(?bool $value): self
    {
        $this->instance->setWithDefinition($value);
        return $this;
    }

    /**
     * Unsets with definition field.
     */
    public function unsetWithDefinition(): self
    {
        $this->instance->unsetWithDefinition();
        return $this;
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
     * Initializes a new Retrieve Customer Custom Attribute Request object.
     */
    public function build(): RetrieveCustomerCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
