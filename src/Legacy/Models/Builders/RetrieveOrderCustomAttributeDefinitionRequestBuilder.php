<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveOrderCustomAttributeDefinitionRequest;

/**
 * Builder for model RetrieveOrderCustomAttributeDefinitionRequest
 *
 * @see RetrieveOrderCustomAttributeDefinitionRequest
 */
class RetrieveOrderCustomAttributeDefinitionRequestBuilder
{
    /**
     * @var RetrieveOrderCustomAttributeDefinitionRequest
     */
    private $instance;

    private function __construct(RetrieveOrderCustomAttributeDefinitionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Order Custom Attribute Definition Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveOrderCustomAttributeDefinitionRequest());
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
     * Initializes a new Retrieve Order Custom Attribute Definition Request object.
     */
    public function build(): RetrieveOrderCustomAttributeDefinitionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
