<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\InvoiceCustomField;

/**
 * Builder for model InvoiceCustomField
 *
 * @see InvoiceCustomField
 */
class InvoiceCustomFieldBuilder
{
    /**
     * @var InvoiceCustomField
     */
    private $instance;

    private function __construct(InvoiceCustomField $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Invoice Custom Field Builder object.
     */
    public static function init(): self
    {
        return new self(new InvoiceCustomField());
    }

    /**
     * Sets label field.
     *
     * @param string|null $value
     */
    public function label(?string $value): self
    {
        $this->instance->setLabel($value);
        return $this;
    }

    /**
     * Unsets label field.
     */
    public function unsetLabel(): self
    {
        $this->instance->unsetLabel();
        return $this;
    }

    /**
     * Sets value field.
     *
     * @param string|null $value
     */
    public function value(?string $value): self
    {
        $this->instance->setValue($value);
        return $this;
    }

    /**
     * Unsets value field.
     */
    public function unsetValue(): self
    {
        $this->instance->unsetValue();
        return $this;
    }

    /**
     * Sets placement field.
     *
     * @param string|null $value
     */
    public function placement(?string $value): self
    {
        $this->instance->setPlacement($value);
        return $this;
    }

    /**
     * Initializes a new Invoice Custom Field object.
     */
    public function build(): InvoiceCustomField
    {
        return CoreHelper::clone($this->instance);
    }
}
