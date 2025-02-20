<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\InvoiceFilter;

/**
 * Builder for model InvoiceFilter
 *
 * @see InvoiceFilter
 */
class InvoiceFilterBuilder
{
    /**
     * @var InvoiceFilter
     */
    private $instance;

    private function __construct(InvoiceFilter $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Invoice Filter Builder object.
     *
     * @param string[] $locationIds
     */
    public static function init(array $locationIds): self
    {
        return new self(new InvoiceFilter($locationIds));
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
     * Initializes a new Invoice Filter object.
     */
    public function build(): InvoiceFilter
    {
        return CoreHelper::clone($this->instance);
    }
}
