<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class InvoiceCanceledEventData extends JsonSerializableType
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
     * @var ?InvoiceCanceledEventObject $object An object containing the canceled invoice.
     */
    #[JsonProperty('object')]
    private ?InvoiceCanceledEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?InvoiceCanceledEventObject,
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
     * @return ?InvoiceCanceledEventObject
     */
    public function getObject(): ?InvoiceCanceledEventObject
    {
        return $this->object;
    }

    /**
     * @param ?InvoiceCanceledEventObject $value
     */
    public function setObject(?InvoiceCanceledEventObject $value = null): self
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
