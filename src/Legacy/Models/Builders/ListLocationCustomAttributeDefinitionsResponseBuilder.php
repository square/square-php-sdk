<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CustomAttributeDefinition;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListLocationCustomAttributeDefinitionsResponse;

/**
 * Builder for model ListLocationCustomAttributeDefinitionsResponse
 *
 * @see ListLocationCustomAttributeDefinitionsResponse
 */
class ListLocationCustomAttributeDefinitionsResponseBuilder
{
    /**
     * @var ListLocationCustomAttributeDefinitionsResponse
     */
    private $instance;

    private function __construct(ListLocationCustomAttributeDefinitionsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Location Custom Attribute Definitions Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLocationCustomAttributeDefinitionsResponse());
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
     * Initializes a new List Location Custom Attribute Definitions Response object.
     */
    public function build(): ListLocationCustomAttributeDefinitionsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
