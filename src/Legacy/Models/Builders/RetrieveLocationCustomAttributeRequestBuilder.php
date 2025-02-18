<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\RetrieveLocationCustomAttributeRequest;

/**
 * Builder for model RetrieveLocationCustomAttributeRequest
 *
 * @see RetrieveLocationCustomAttributeRequest
 */
class RetrieveLocationCustomAttributeRequestBuilder
{
    /**
     * @var RetrieveLocationCustomAttributeRequest
     */
    private $instance;

    private function __construct(RetrieveLocationCustomAttributeRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Location Custom Attribute Request Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLocationCustomAttributeRequest());
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
     * Initializes a new Retrieve Location Custom Attribute Request object.
     */
    public function build(): RetrieveLocationCustomAttributeRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
