<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class InventoryCountUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type. For this event, the value is `inventory_counts`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?InventoryCountUpdatedEventObject $object An object containing fields and values relevant to the event. Is absent if affected object was deleted.
     */
    #[JsonProperty('object')]
    private ?InventoryCountUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?InventoryCountUpdatedEventObject,
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
     * @return ?InventoryCountUpdatedEventObject
     */
    public function getObject(): ?InventoryCountUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?InventoryCountUpdatedEventObject $value
     */
    public function setObject(?InventoryCountUpdatedEventObject $value = null): self
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
