<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TransferOrderCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"transfer_order"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected transfer_order.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?TransferOrderCreatedEventObject $object An object containing the created transfer_order.
     */
    #[JsonProperty('object')]
    private ?TransferOrderCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?TransferOrderCreatedEventObject,
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
     * @return ?TransferOrderCreatedEventObject
     */
    public function getObject(): ?TransferOrderCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?TransferOrderCreatedEventObject $value
     */
    public function setObject(?TransferOrderCreatedEventObject $value = null): self
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
