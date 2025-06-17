<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BookingUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the event data object. The value is `"booking"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the event data object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?BookingUpdatedEventObject $object An object containing the updated booking.
     */
    #[JsonProperty('object')]
    private ?BookingUpdatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?BookingUpdatedEventObject,
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
     * @return ?BookingUpdatedEventObject
     */
    public function getObject(): ?BookingUpdatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?BookingUpdatedEventObject $value
     */
    public function setObject(?BookingUpdatedEventObject $value = null): self
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
