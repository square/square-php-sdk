<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An additional seller-defined and customer-facing field to include on the invoice. For more information,
 * see [Custom fields](https://developer.squareup.com/docs/invoices-api/overview#custom-fields).
 *
 * Adding custom fields to an invoice requires an
 * [Invoices Plus subscription](https://developer.squareup.com/docs/invoices-api/overview#invoices-plus-subscription).
 */
class InvoiceCustomField extends JsonSerializableType
{
    /**
     * @var ?string $label The label or title of the custom field. This field is required for a custom field.
     */
    #[JsonProperty('label')]
    private ?string $label;

    /**
     * @var ?string $value The text of the custom field. If omitted, only the label is rendered.
     */
    #[JsonProperty('value')]
    private ?string $value;

    /**
     * The location of the custom field on the invoice. This field is required for a custom field.
     * See [InvoiceCustomFieldPlacement](#type-invoicecustomfieldplacement) for possible values
     *
     * @var ?value-of<InvoiceCustomFieldPlacement> $placement
     */
    #[JsonProperty('placement')]
    private ?string $placement;

    /**
     * @param array{
     *   label?: ?string,
     *   value?: ?string,
     *   placement?: ?value-of<InvoiceCustomFieldPlacement>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->label = $values['label'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->placement = $values['placement'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param ?string $value
     */
    public function setLabel(?string $value = null): self
    {
        $this->label = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param ?string $value
     */
    public function setValue(?string $value = null): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return ?value-of<InvoiceCustomFieldPlacement>
     */
    public function getPlacement(): ?string
    {
        return $this->placement;
    }

    /**
     * @param ?value-of<InvoiceCustomFieldPlacement> $value
     */
    public function setPlacement(?string $value = null): self
    {
        $this->placement = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
