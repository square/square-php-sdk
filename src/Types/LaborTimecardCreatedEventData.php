<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LaborTimecardCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of object affected by the event. For this event, the value is `timecard`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the affected `Timecard`.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?LaborTimecardCreatedEventObject $object An object containing the affected `Timecard`.
     */
    #[JsonProperty('object')]
    private ?LaborTimecardCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?LaborTimecardCreatedEventObject,
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
     * @return ?LaborTimecardCreatedEventObject
     */
    public function getObject(): ?LaborTimecardCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?LaborTimecardCreatedEventObject $value
     */
    public function setObject(?LaborTimecardCreatedEventObject $value = null): self
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
