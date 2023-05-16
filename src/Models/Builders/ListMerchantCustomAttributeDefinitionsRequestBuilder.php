<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListMerchantCustomAttributeDefinitionsRequest;

/**
 * Builder for model ListMerchantCustomAttributeDefinitionsRequest
 *
 * @see ListMerchantCustomAttributeDefinitionsRequest
 */
class ListMerchantCustomAttributeDefinitionsRequestBuilder
{
    /**
     * @var ListMerchantCustomAttributeDefinitionsRequest
     */
    private $instance;

    private function __construct(ListMerchantCustomAttributeDefinitionsRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list merchant custom attribute definitions request Builder object.
     */
    public static function init(): self
    {
        return new self(new ListMerchantCustomAttributeDefinitionsRequest());
    }

    /**
     * Sets visibility filter field.
     */
    public function visibilityFilter(?string $value): self
    {
        $this->instance->setVisibilityFilter($value);
        return $this;
    }

    /**
     * Sets limit field.
     */
    public function limit(?int $value): self
    {
        $this->instance->setLimit($value);
        return $this;
    }

    /**
     * Unsets limit field.
     */
    public function unsetLimit(): self
    {
        $this->instance->unsetLimit();
        return $this;
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Unsets cursor field.
     */
    public function unsetCursor(): self
    {
        $this->instance->unsetCursor();
        return $this;
    }

    /**
     * Initializes a new list merchant custom attribute definitions request object.
     */
    public function build(): ListMerchantCustomAttributeDefinitionsRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
