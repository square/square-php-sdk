<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class InvoiceScheduledChargeFailedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"invoice"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected invoice.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?InvoiceScheduledChargeFailedEventObject $object An object containing the invoice that experienced the failed scheduled charge.
     */
    #[JsonProperty('object')]
    private ?InvoiceScheduledChargeFailedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?InvoiceScheduledChargeFailedEventObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?InvoiceScheduledChargeFailedEventObject
     */
    public function getObject(): ?InvoiceScheduledChargeFailedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?InvoiceScheduledChargeFailedEventObject $value
     */
    public function setObject(?InvoiceScheduledChargeFailedEventObject $value = null): self
    {
        $this->object = $value;
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
