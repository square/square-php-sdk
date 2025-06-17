<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CardCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the event data object. The value is `"card"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id The ID of the event data object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?CardCreatedEventObject $object An object containing the created card.
     */
    #[JsonProperty('object')]
    private ?CardCreatedEventObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?CardCreatedEventObject,
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
     * @return ?CardCreatedEventObject
     */
    public function getObject(): ?CardCreatedEventObject
    {
        return $this->object;
    }

    /**
     * @param ?CardCreatedEventObject $value
     */
    public function setObject(?CardCreatedEventObject $value = null): self
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
