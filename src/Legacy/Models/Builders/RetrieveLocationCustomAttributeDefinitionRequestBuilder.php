<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveLocationCustomAttributeDefinitionRequest;

/**
 * Builder for model RetrieveLocationCustomAttributeDefinitionRequest
 *
 * @see RetrieveLocationCustomAttributeDefinitionRequest
 */
class RetrieveLocationCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var RetrieveLocationCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(RetrieveLocationCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Location Custom Attribute Definition Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLocationCustomAttributeDefinitionRequest());
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
     * Initializes a new Retrieve Location Custom Attribute Definition Request object.
     */
    public function build(): RetrieveLocationCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
