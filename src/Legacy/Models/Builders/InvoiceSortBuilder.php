<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\InvoiceSort;

/**
 * Builder for model InvoiceSort
 *
 * @see InvoiceSort
 */
class InvoiceSortBuilder
{
    /**
     * @var InvoiceSort
     */
    private $instance;

    private function __construct(InvoiceSort $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Invoice Sort Builder object.
     */
    public static function init(): self
    {
        return new self(new InvoiceSort());
    }

    /**
     * Sets order field.
     *
     * @param string|null $value
     */
    public function order(?string $value): self
    {
        $this->instance->setOrder($value);
        return $this;
    }

    /**
     * Initializes a new Invoice Sort object.
     */
    public function build(): InvoiceSort
    {
        return CoreHelper::clone($this->instance);
    }
}
