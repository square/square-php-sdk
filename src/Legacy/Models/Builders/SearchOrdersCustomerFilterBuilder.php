<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\SearchOrdersCustomerFilter;

/**
 * Builder for model SearchOrdersCustomerFilter
 *
 * @see SearchOrdersCustomerFilter
 */
class SearchOrdersCustomerFilterBuilder
{
    /**
     * @var SearchOrdersCustomerFilter
     */
    private $instance;

    private function __construct(SearchOrdersCustomerFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Orders Customer Filter Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchOrdersCustomerFilter());
    }

    /**
     * Sets customer ids field.
     *
     * @param string[]|null $value
     */
    public function customerIds(?array $value): self
    {
        $this->instance->setCustomerIds($value);
        return $this;
    }

    /**
     * Unsets customer ids field.
     */
    public function unsetCustomerIds(): self
    {
        $this->instance->unsetCustomerIds();
        return $this;
    }

    /**
     * Initializes a new Search Orders Customer Filter object.
     */
    public function build(): SearchOrdersCustomerFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
