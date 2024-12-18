<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\InvoiceFilter;
use Square\Models\InvoiceQuery;
use Square\Models\InvoiceSort;

/**
 * Builder for model InvoiceQuery
 *
 * @see InvoiceQuery
 */
class InvoiceQueryBuilder
{
    /**
     * @var InvoiceQuery
     */
    private $instance;

    private function __construct(InvoiceQuery $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Invoice Query Builder object.
     *
     * @param InvoiceFilter $filter
     */
    public static function init(InvoiceFilter $filter): self
    {
        return new self(new InvoiceQuery($filter));
    }

    /**
     * Sets sort field.
     *
     * @param InvoiceSort|null $value
     */
    public function sort(?InvoiceSort $value): self
    {
        $this->instance->setSort($value);
        return $this;
    }

    /**
     * Initializes a new Invoice Query object.
     */
    public function build(): InvoiceQuery
    {
        return CoreHelper::clone($this->instance);
    }
}
