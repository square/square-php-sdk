<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\InvoiceRecipientTaxIds;

/**
 * Builder for model InvoiceRecipientTaxIds
 *
 * @see InvoiceRecipientTaxIds
 */
class InvoiceRecipientTaxIdsBuilder
{
    /**
     * @var InvoiceRecipientTaxIds
     */
    private $instance;

    private function __construct(InvoiceRecipientTaxIds $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Invoice Recipient Tax Ids Builder object.
     */
    public static function init(): self
    {
        return new self(new InvoiceRecipientTaxIds());
    }

    /**
     * Sets eu vat field.
     *
     * @param string|null $value
     */
    public function euVat(?string $value): self
    {
        $this->instance->setEuVat($value);
        return $this;
    }

    /**
     * Initializes a new Invoice Recipient Tax Ids object.
     */
    public function build(): InvoiceRecipientTaxIds
    {
        return CoreHelper::clone($this->instance);
    }
}
