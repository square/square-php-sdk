<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveOrderCustomAttributeRequest;

/**
 * Builder for model RetrieveOrderCustomAttributeRequest
 *
 * @see RetrieveOrderCustomAttributeRequest
 */
class RetrieveOrderCustomAttributeRequestBuilder
{
    /**
     * @var RetrieveOrderCustomAttributeRequest
     */
    private $instance;

    private function __construct(RetrieveOrderCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Order Custom Attribute Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveOrderCustomAttributeRequest());
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
     * Initializes a new Retrieve Order Custom Attribute Request object.
     */
    public function build(): RetrieveOrderCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
