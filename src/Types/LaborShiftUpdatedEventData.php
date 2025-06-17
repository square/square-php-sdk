<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LaborShiftUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `shift`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected `Shift`.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LaborShiftUpdatedEventObject $object An object containing the affected `Shift`.
     */
    #[JsonProperty('object')]
    private ?LaborShiftUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LaborShiftUpdatedEventObject,
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
     * @return ?LaborShiftUpdatedEventObject
     */
    public function getObject(): ?LaborShiftUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LaborShiftUpdatedEventObject $value
     */
    public function setObject(?LaborShiftUpdatedEventObject $value = null): self
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
